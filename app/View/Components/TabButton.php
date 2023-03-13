<?php

namespace App\View\Components;

use App\Models\Championnat;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Championnat $championnat
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tab-button');
    }
}
