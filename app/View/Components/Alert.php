<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $handled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($handled = null)
    {
        $this->handled = $handled ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.alert');
    }
}
