<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class Header extends Component
{
    public $title = '';

    public function render()
    {
        return view('livewire.common.header');
    }
}
