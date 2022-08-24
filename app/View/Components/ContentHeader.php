<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentHeader extends Component
{
    public $title;
    public $titleLink1;
    public $link1;
    public $titleLink2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $titleLink1 = '', $link1 = '', $titleLink2 = '')
    {
        $this->title = $title;
        $this->titleLink1 = $titleLink1;
        $this->link1 = $link1;
        $this->titleLink2 = $titleLink2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-header');
    }
}
