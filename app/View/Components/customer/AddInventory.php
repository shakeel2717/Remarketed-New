<?php

namespace App\View\Components\customer;

use Illuminate\View\Component;

class AddInventory extends Component
{
    public $rma;
    public $reasons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rma, $reasons)
    {
        $this->rma = $rma;
        $this->reasons = $reasons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customer.add-inventory');
    }
}
