<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlertError extends Component
{

    public $errorMsg;


    protected $listeners = ['showAlertError'];

    public function showAlertError($errorMsg) 
    {
        $this->errorMsg = $errorMsg;
        $this->dispatchBrowserEvent('alert-error-message');
    }

    public function render()
    {
        return view('livewire.alert-error');
    }
}
