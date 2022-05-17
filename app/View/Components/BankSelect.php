<?php

namespace App\View\Components;

use App\Models\BankBranch;
use Illuminate\View\Component;

class BankSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $branches;
    public function __construct($branch)
    {
        $branches = BankBranch::where('country_id' , $branch)->get();
        $this->branches = $branches;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bank-select');
    }
}
