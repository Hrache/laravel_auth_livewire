<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        return <<<'blade'
            <footer class="w3-row w3-grey" style="min-height: 25vh;">

                <div class="w3-col s12 m12 l12">
                    <iframe
                        style="min-height:25vmax;min-width:100%;border:0;"
                        loading="lazy"
                        allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?key={{ config("app.google_api_key") }}&q=Galshoyan+St,+Yerevan,+Armenia">
                    </iframe>
                </div>

                <div class="w3-col s12 m4 l4">

                </div>
            </footer>
        blade;
    }
}
