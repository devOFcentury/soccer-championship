<?php

namespace App\View\Components;

use App\Models\Championnat;
use App\Models\Stat;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Classement extends Component
{

    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Championnat $championnat,
        public $stats,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.classement');
    }
}
