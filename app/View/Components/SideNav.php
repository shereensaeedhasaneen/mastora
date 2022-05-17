<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideNav extends Component
{

    public $link;
    public $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link =0 , $active = 1)
    {
        $this->link =$link;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-nav');
    }
}
