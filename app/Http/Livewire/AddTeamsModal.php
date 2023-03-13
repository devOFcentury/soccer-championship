<?php

namespace App\Http\Livewire;

use App\Models\Championnat;
use App\Models\Equipe;
use App\Models\Stat;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class AddTeamsModal extends Component
{
    public $championnat;

    public string $nom ="";

    public $show = false;

    protected $listeners = ['addTeamsModal'];

    public function addTeamsModal(Championnat $championnat)
    {
        $this->championnat = $championnat;
        $this->dispatchBrowserEvent('add-team-modal');
    }

    public function closeAddTeamsModal() 
    {
        $this->reset('nom');
        $this->show = false;
    }


    protected $rules = [
        'nom' => 'required|min:3|unique:' . Equipe::class,
    ];

    public function addTeam() 
    {
        $this->validate();

        if (!is_null($this->championnat->nombre_journees) || $this->championnat->nombre_journees > 6 ) {
            return $this->addError('full', 'vous ne pouvez plus ajouter d\'equipe. vous avez déja valider le nombre d\'equipe requis');
        }


        $equipe = Equipe::create([
            'nom' => ucfirst($this->nom),
            'championnat_id' => $this->championnat->id
        ]);

        Stat::create([
            'mj' => 0,
            'g' => 0,
            'n' => 0,
            'p' => 0,
            'bp' => 0,
            'bc' => 0,
            'db' => 0,
            'pts' => 0,
            'equipe_id' => $equipe->id,
            'championnat_id'=> $this->championnat->id,
        ]);

        return to_route('championnat.classement', ['championnat' => $this->championnat->id]);

    }

    public function render()
    {
        return view('livewire.add-teams-modal');
    }
}
