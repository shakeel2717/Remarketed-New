<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Box extends Component
{
    public $value;
    public $heading;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value,$heading)
    {
        $this->heading = $heading;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box');
    }
}
