<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Championnat;
use App\Models\Equipe;
use App\Models\Journee;
use App\Models\MatchFootball;
use App\Models\Stat;
use Illuminate\Database\Eloquent\Builder;

class AddMatchModal extends Component
{

    public $championnat;

    public $show = false;
    public $exterieur;

    public $equipe_domicile;
    public $equipe_exterieur;
    public $score_equipe_domicile;
    public $score_equipe_exterieur;

    protected $equipe_domicile_id;
    protected $equipe_exterieur_id;

    public function updatedEquipeDomicile() 
    {
        $this->exterieur = $this->championnat->equipes()->where('nom', '!=', $this->equipe_domicile)->get();
    }

    protected $rules = [
        'equipe_domicile' => 'required',
        'equipe_exterieur' => 'required',
        'score_equipe_domicile' => 'required|numeric|integer',
        'score_equipe_exterieur' => 'required|numeric|integer',
    ];

    public function addMatch() 
    {
        
        $this->validate();

        $journee = Journee::where('championnat_id', $this->championnat->id)
        ->where('validated', 0)
        ->orderBy('id', 'desc')->first();

        $infoEquipeDomicile = Equipe::where('nom', $this->equipe_domicile)->first();
        $infoEquipeExterieur = Equipe::where('nom', $this->equipe_exterieur)->first();

        $this->equipe_domicile_id = $infoEquipeDomicile->id;
        $this->equipe_exterieur_id = $infoEquipeExterieur->id;

                          
        $match_equipe_domicile = MatchFootball::where('journee_id', $journee->id)
        ->where(function (Builder $query) {
            $query->where('equipe_domicile', $this->equipe_domicile_id)
            ->orWhere('equipe_exterieur', $this->equipe_domicile_id);
        })->get();
                            
        $match_equipe_exterieur = MatchFootball::where('journee_id', $journee->id)
        ->where(function (Builder $query) {
            $query->where('equipe_domicile', $this->equipe_exterieur_id)
            ->orWhere('equipe_exterieur', $this->equipe_exterieur_id);
        })->get();
                            
                            
        $matchTwice = MatchFootball::where('championnat_id', $this->championnat->id)
        ->where('equipe_domicile', $infoEquipeExterieur->id)
        ->where('equipe_exterieur', $infoEquipeDomicile->id)->get();
                            
        $domicileMatch = MatchFootball::where('championnat_id', $this->championnat->id)
        ->where('equipe_domicile', $infoEquipeDomicile->id)
        ->where('equipe_exterieur', $infoEquipeExterieur->id)->get();
        

        // vérifier si l'équipe domicile essaie de jouer plus de 1 fois dans la même journée
        if ($match_equipe_domicile->count() > 0) {
           return  $this->addError('checkMatch', $this->equipe_domicile . ' ne peut pas jouer dans la même journée');
        }

        // vérifier si l'équipe extérieur essaie de jouer plus de 1 fois dans la même journée
        if ($match_equipe_exterieur->count() > 0) {
           return  $this->addError('checkMatch', $this->equipe_exterieur . ' ne peut pas jouer dans la même journée');
        }

        // vérifier si l'équipe a déja joué avec son adversaire deux fois
        if ($matchTwice->count() >= 2) {
            return  $this->addError('checkMatch', 'Les deux équipes ont déjà joué deux fois');
        }

        // Vérifier si l'équipe à domicile a déjà joué à domicile avec l'équipe extérieur
        if ($domicileMatch->count() > 0) {
            return $this->addError('checkMatch', $this->equipe_domicile . ' a déjà joué à domicile avec ' . $this->equipe_exterieur);
        }


        MatchFootball::create([
            'equipe_domicile' => $infoEquipeDomicile->id,
            'equipe_exterieur' => $infoEquipeExterieur->id,
            'score_equipe_domicile' => $this->score_equipe_domicile,
            'score_equipe_exterieur' => $this->score_equipe_exterieur,
            'journee_id' => $journee->id,
            'championnat_id' => $this->championnat->id,
        ]);


        $statEquipeDomicile = Stat::where('equipe_id', $infoEquipeDomicile->id)->first();
        $statEquipeExterieur = Stat::where('equipe_id', $infoEquipeExterieur->id)->first();


        $statEquipeDomicile->mj = $statEquipeDomicile->mj + 1;
        $statEquipeExterieur->mj = $statEquipeExterieur->mj + 1;
        
        if ($this->score_equipe_domicile > $this->score_equipe_exterieur) {
            $statEquipeDomicile->g = $statEquipeDomicile->g + 1;
            $statEquipeExterieur->p = $statEquipeExterieur->p + 1;

            $statEquipeDomicile->pts = $statEquipeDomicile->pts + 3;
        }
        elseif ($this->score_equipe_domicile == $this->score_equipe_exterieur) {
            $statEquipeDomicile->n = $statEquipeDomicile->n + 1;
            $statEquipeExterieur->n = $statEquipeExterieur->n + 1;

            $statEquipeDomicile->pts = $statEquipeDomicile->pts + 1;
            $statEquipeExterieur->pts = $statEquipeExterieur->pts + 1;
        }
        else {
            $statEquipeExterieur->g = $statEquipeExterieur->g + 1;
            $statEquipeDomicile->p = $statEquipeDomicile->p + 1;

            $statEquipeExterieur->pts = $statEquipeExterieur->pts + 3;
        }

        $statEquipeDomicile->bp = $statEquipeDomicile->bp + $this->score_equipe_domicile;
        $statEquipeExterieur->bp = $statEquipeExterieur->bp + $this->score_equipe_exterieur;
        
        $statEquipeDomicile->bc = $statEquipeDomicile->bc + $this->score_equipe_exterieur;
        $statEquipeExterieur->bc = $statEquipeExterieur->bc + $this->score_equipe_domicile;


        $statEquipeDomicile->db = $statEquipeDomicile->bp - $statEquipeDomicile->bc;
        $statEquipeExterieur->db = $statEquipeExterieur->bp - $statEquipeExterieur->bc;

        if ($statEquipeDomicile->isDirty() && $statEquipeExterieur->isDirty()) {
            $statEquipeDomicile->save();
            $statEquipeExterieur->save();
            return to_route('championnat.match', ['championnat' => $this->championnat->id]);
        }
        
        $this->resetExcept(['championnat', 'show']);
        $this->show = false;
        return $this->emit('showAlertError', "Quelque chose s'est mal passé");
        
    }    
    
    protected $listeners = ['addMatchModal'];

    public function addMatchModal(Championnat $championnat) 
    {
        $this->championnat = $championnat;
        $this->dispatchBrowserEvent('add-match-modal');
    }

    public function closeAddMatchModal() 
    {
        $this->resetExcept(['championnat', 'show']);
        $this->show = false; 
    }

    public function render()
    {
        return view('livewire.add-match-modal');
    }
}
