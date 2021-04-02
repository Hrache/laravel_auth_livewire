<form class="w3-content w3-card w3-padding w3-round-large w3-border" action="{{ route('register') }}" method="post" style="max-width: 512px;">

    @csrf

    <input type="text" name="name" class="w3-input w3-margin-bottom" placeholder="Enter name here" value="{{ old('name') }}" required />
    <input type="email" name="email" class="w3-input w3-margin-bottom" placeholder="Enter email here" value="{{ old('email') }}" required />
    <input type="password" name="password" class="w3-input w3-margin-bottom" placeholder="Enter password here" value="{{ old('password') }}" required />
    <input type="password_confirmation" name="password_confirmation" class="w3-input w3-margin-bottom" placeholder="Confirm password here" value="{{ old('password_confirmation') }}" required />

    <footer class="w3-bar">
        <button type="submit" class="w3-button w3-bar-item w3-red w3-tooltip">
            <span class="fa fa-arrow-right w3-text w3-animate-zoom"></span> Register
        </button>
        <button type="reset" class="w3-button w3-bar-item w3-pale-blue w3-tooltip" />
            <span class="fa fa-truck w3-text w3-animate-zoom"></span> Reset
        </button>
    </footer>
</form>
