<?php

namespace App\View\Components;

use Closure;
use App\Models\Championnat;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MatchFootball extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Championnat $championnat,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.match-football');
    }
}
