<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlertSuccess extends Component
{
    
    public $successMsg;

    protected $listeners = ['showAlertSuccess'];

    public function showAlertSuccess($successMsg) 
    {
        $this->successMsg = $successMsg;
        $this->dispatchBrowserEvent('alert-success-message');

    }

    public function render()
    {
        return view('livewire.alert-success');
    }
}
