<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home')
                ->extends('layouts.default', [
                    'pagetitle' => 'Main page',
                    'title' => 'Welcome to home page: demo fo laravel, livewire and auth ...'
                ])
                ->section('main');
    }
}
