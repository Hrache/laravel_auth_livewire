<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class MobileNavbar extends Component
{
    public function render()
    {
        return <<<'blade'
        <nav class="w3-bar-block w3-hide w3-animate-opacity" id="w3Sidebar">
            <a href="{{ route('home.index') }}" class="w3-bar-item w3-button">Home</a>
            <a href="{{ route('tailwind.demo') }}" class="w3-bar-item w3-button">Tailwind</a>
        
            @if(Route::has('login'))
                <section class="w3-bar-item w3-bar w3-right" style="padding: 0 0 !important;">
                @guest
                    <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
        
                    @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
                    @endif
                @else
                    <a href="{{ route('cpanel.index') }}" class="w3-bar-item w3-button">CPanel</a>
        
                    <button href="{{ route('register') }}" class="w3-bar-item w3-button w3-orange" onclick="$( '#logoutform' ).submit();">Logout</button>
        
                    <form action="{{ route('signout') }}" method="post" id="logoutform">@csrf</form>
                @endguest
                </section>
            @endif
        </nav>
        blade;
    }
}
