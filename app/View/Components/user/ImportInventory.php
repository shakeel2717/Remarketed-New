<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class ImportInventory extends Component
{
    public $rma;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rma)
    {
        $this->rma = $rma;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.import-inventory');
    }
}
