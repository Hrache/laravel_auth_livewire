<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TailwindDemo extends Component
{
    public function render()
    {
        return view('livewire.tailwind-demo', [
                'title' => 'Welcome to tailwind demo page'
            ])
            ->extends('layouts.tailwind', [
                'pagetitle' => 'Tailwind demo'
            ])
            ->section('main');
    }
}
