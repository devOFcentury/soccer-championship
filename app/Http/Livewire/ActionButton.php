<?php

namespace App\Http\Livewire;

use App\Models\Journee;
use App\Models\MatchFootball;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class ActionButton extends Component
{
    public $championnat;
    public $showAddTeam = true;
    public $showValidateChampionnat = true;
    public $showOpenDay = false;
    public $showAddMatch = false;
    public $showCloseDay = false;
    public $test = true;

    protected $listeners = ['refreshUpdates' => '$refresh'];


    public function booted()
    {
        $daysNumber =  $this->championnat->nombre_journees; 
        $getJourneeInvalid = $this->championnat->journees()->where('validated', 0)->orderBy('id', 'desc')->first();

        // si le championnat a été validé
        if ($daysNumber > 0) {
            $this->showAddTeam = false;
            $this->showValidateChampionnat = false;
            $this->showOpenDay = true;
            $this->showAddMatch = true;
            $this->showCloseDay = true;
        }

        // si une journée a été ouvert on cache le bouton ouvrir
        if ($getJourneeInvalid) {
            $this->showOpenDay = false;
            $this->showAddMatch = true;
            $this->showCloseDay = true;
        }

        // si il n'ya pas de journée ouvert on cache le bouton d'ajout de match et de fermeture d'une journée
        if (!$getJourneeInvalid) {
            $this->showAddMatch = false;
            $this->showCloseDay = false;
        }
    }


    public function updateProperties()
    {
        $getJourneeInvalid = $this->championnat->journees()->where('validated', 0)->orderBy('id', 'desc')->first();
        $daysNumber =  $this->championnat->nombre_journees; 

        // si une journée a été ouvert on cache le bouton ouvrir
        if ($getJourneeInvalid) {
            $this->showOpenDay = false;
        }

        // si une journée est fermé on affiche le bouton ouvrir
        if (is_null($getJourneeInvalid)) {
            $this->showOpenDay = true;
        }

         // si le championnat a été validé
         if ($daysNumber > 0) {
            $this->showAddTeam = false;
            $this->showValidateChampionnat = false;
            $this->showOpenDay = true;
            $this->showAddMatch = true;
            $this->showCloseDay = true;
        }

        return $this->emit('refreshUpdates');

    }

    protected array $equipesListID = [];

    public function validateTeams() 
    {
        
        
        $teamsNumber = $this->championnat->equipes->count();
        if ($teamsNumber >= 8 && $teamsNumber <= 20 && $teamsNumber % 2 == 0) {
            $numberOfTeams = $teamsNumber;
            $numberOfMatch = $numberOfTeams *($numberOfTeams - 1);
            $numberOfDays = $numberOfMatch / (2 * $numberOfTeams);

            $this->championnat->nombre_journees = ceil($numberOfDays);
            
            if ($this->championnat->isDirty('nombre_journees')) {
                $this->championnat->save();

                $this->showAddTeam = false;
                $this->showValidateChampionnat = false;
                $this->showOpenDay = true;
                $this->showAddMatch = true;
                $this->showCloseDay = true;
                $this->updateProperties();
                
                return $this->emit('showAlertSuccess', 'championnat validé avec success');
            }
        }

        return $this->emit('showAlertError', 'le minimum d\'équipe requis est de 8 et le maximum est de 20. Et aussi le nombre d\'équipe doit être pair');
    }

    public function openDay() 
    {
        $daysNumber =  $this->championnat->nombre_journees; 
        // si le nombre de journée du championnat est null ou 0 on renvoie un message d'erreur
        if (is_null($daysNumber) || $daysNumber == 0) {
            return $this->emit('showAlertError', 'Vous ne pouvez pas encore ouvrir une journée tant que le championnat n\'a pas été validé, ou qu\'une journée n\'a pas été fermée');
        }

        // si on a atteint ou dépassé le nombre de journée requis on renvoie un message d'erreur
        if ($this->championnat->journees->count() >= $daysNumber ) {
            $message = "Vous avez déja atteint le nombre de journée qui est de " . $daysNumber . '. Donc le championnat est clos';
           return $this->emit('showAlertError', $message);
        }

        // recuperer le dernier enregistrement parmi les journées dont validated est égal à 0
        $getJourneeInvalid = $this->championnat->journees()->where('validated', 0)->orderBy('id', 'desc')->first();

        if ($getJourneeInvalid) {
            return $this->emit('showAlertError', 'vous devez valider la dernière journée avant d\'en ouvrir une');
        }
        
        
        $journee = Journee::create([
          'journee' =>   $this->championnat->journees->count() + 1,
          'validated' => false,
          'championnat_id' => $this->championnat->id,
        ]);

        // on cache le bouton ouvrir après avoir ouvert une journée
        $this->showOpenDay = false;
        $this->showAddMatch = true;
        $this->showCloseDay = true;
        $this->updateProperties();
        
        return $this->emit('showAlertSuccess', 'journée ' . $journee->journee . ' ajoutée ouvert avec success. Vous pouvez ajouter des match maintenant');
        
    }

    public function checkAddMatch() 
    {
        $journee = Journee::where('validated', false)
        ->where('championnat_id', $this->championnat->id)
        ->get();


        // si le nombre de journée non validé est égal 0
        if ($journee->count() == 0) {
            return $this->emit('showAlertError', 'Vous devez ouvir une journée d\'abord');
        }

       
        $daysNumber = $this->championnat->nombre_journees;
        // si le nombre de journée du championnat est null ou 0 on renvoie un message d'erreur
        if (is_null($daysNumber) || $daysNumber == 0) {
            return $this->emit('showAlertError', 'Vous ne pouvez pas encore Ajouter des match tant que le championnat n\'a pas été validé et qu\'une journée n\'a pas été ouvert');
        }

        return $this->emit('addMatchModal', $this->championnat);
    }

    public function CloseDay() 
    {
        // récuperer tous les valeurs de la colonne id là ou championnat_id est égal à la championnat actuelle
        $equipesListID = DB::table('equipes')->where('championnat_id', $this->championnat->id)
        ->pluck('id');

        foreach ($equipesListID as $id) {
            array_push($this->equipesListID, $id);
        }

        $playedTeam = MatchFootball::where('championnat_id', $this->championnat->id)
        ->select('equipe_domicile', 'equipe_exterieur')->get();

        $playedTeam = collect($playedTeam->toArray())->flatten()->all();

        $checkplayedTeam = array_diff($this->equipesListID, $playedTeam);


        $checkunplayedTeam = collect($checkplayedTeam);


        if ($checkunplayedTeam->count() > 0) {
            return $this->emit('showAlertError', "il y'a des match qui reste. faites jouer les équipes restantes pour clore la journée");
        }

        // recuperer le dernier enregistrement parmi les journées dont validated est égal à 0
        $getJourneeInvalid = $this->championnat->journees()->where('validated', 0)->orderBy('id', 'desc')->first();
    

        $getJourneeInvalid->validated = true;

        if ($getJourneeInvalid->isDirty()) {
            $getJourneeInvalid->save();
            // on affiche le bouton ouvrir après avoir fermé une journée
            $this->showOpenDay = true;
            $this->showCloseDay = false;
            $this->showAddMatch = false;
            $this->updateProperties();
            return $this->emit('showAlertSuccess', 'Journée ' . $getJourneeInvalid->journee . ' fermée avec succèss');
        }
       
    }

    public function render()
    {
        return view('livewire.action-button');
    }
}
