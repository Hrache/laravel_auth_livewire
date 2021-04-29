<form class="w3-content w3-padding w3-round-large w3-border" action="{{ route('register') }}" method="post" style="max-width: 512px;">
    @csrf

    <div class="form-row">
        <label for="name"><strong>{{ __('cpanel.name') }}</strong></label>
        <input type="text" id="name" name="name" class="w3-input w3-margin-bottom" value="{{ old('name') }}" required />
    </div>

    <div class="form-row">
        <label for="email"><strong>{{ __('cpanel.email') }}</strong></label>
        <input type="email" id="email" name="email" class="w3-input w3-margin-bottom" value="{{ old('email') }}" required />
    </div>

    <div class="form-row">
        <label for="password"><strong>{{ __('cpanel.password') }}</strong></label>
        <input type="password" id="password" name="password" class="w3-input w3-margin-bottom" required />
    </div>

    <div class="form-row">
        <label for="password_confirmation"><strong>{{ __('cpanel.password-confirmation') }}</strong></label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="w3-input w3-margin-bottom" required />
    </div>

    <footer class="w3-bar">
        <button type="submit" class="w3-button w3-bar-item w3-red w3-tooltip">
            <span class="fa fa-arrow-right w3-text w3-animate-zoom"></span> Register
        </button>
        <button type="reset" class="w3-button w3-bar-item w3-pale-blue w3-tooltip" />
            <span class="fa fa-truck w3-text w3-animate-zoom"></span> Reset
        </button>
    </footer>
</form>
