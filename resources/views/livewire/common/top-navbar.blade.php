<nav class="w3-bar w3-green">
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
        <button href="{{ route('register') }}" class="w3-bar-item w3-button w3-orange" onclick="$( '#logoutform' ).submit();">Logout</button>
        <form action="{{ route('signout') }}" method="post" id="logoutform">@csrf</form>
            @endguest
    </section>
    @endif
</nav>
