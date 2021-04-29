<form class="w3-content w3-padding w3-round-large w3-border" action="{{ route('signin') }}" method="post" style="max-width: 512px;">
    @csrf
    <div class="form-row">
        <label for="email"><strong>{{ __('cpanel.email') }}</strong></label>
        <input type="email" id="email" class="w3-input w3-margin-bottom" name="email" value="{{ old('email') }}" required />
    </div>
    
    <div class="form-row">
        <label for="password"><strong>{{ __('cpanel.password') }}</strong></label>
        <input type="password" id="password" class="w3-input w3-margin-bottom" name="password" value="{{ old('password') }}" required />
    </div>

    <footer class="w3-bar">
        <button type="submit" class="w3-button w3-bar-item w3-red w3-tooltip">
            <span class="w3-large fa fa-arrow-right"></span><span class="w3-text w3-animate-zoom">Login</span>
        </button>
        <button type="reset" class="w3-button w3-bar-item w3-pale-blue w3-tooltip" />
            <span class="fa fa-truck"></span><span class="w3-text w3-animate-zoom">Reset</span>
        </button>
    </footer>
</form>
