{{-- Main navbar --}}
<nav class="w3-bar w3-blue w3-padding">
    <button onclick="$( '#w3Sidebar' ).toggleClass( 'w3-hide' )" class="w3-bar-item w3-button w3-hide-medium w3-hide-large">Menu</button>

    <a href="{{ route('home.index') }}" class="w3-bar-item w3-button w3-hide-small">Home</a>
    <a href="{{ route('tailwind.demo') }}" class="w3-bar-item w3-button w3-hide-small">Tailwind</a>

    @if(Route::has('login'))
        <section class="w3-bar-item w3-bar w3-right w3-hide-small" style="padding: 0 0 !important;">
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

{{-- Toggleable sidebar for the main menu --}}
<livewire:common.mobile-navbar />