<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class GoogleMapsEmbed extends Component
{
    public $gapikey = '';

    public function render()
    {
        return <<<'blade'
            <section class="w3-padding">
                <iframe
                    style="min-height:25vmax;min-width:100%;border:0;"
                    loading="lazy"
                    allowfullscreen
                    src="https://www.google.com/maps/embed/v1/place?key={{ $gapikey }}&q=Galshoyan+St,+Yerevan,+Armenia">
                </iframe>
            </section>
        blade;
    }
}
