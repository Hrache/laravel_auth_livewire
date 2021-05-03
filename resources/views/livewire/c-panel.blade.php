@push('head')
<style>
.form-row {
    min-height: 5vmax;
}

@media only screen and (max-width: 375px) {
    .form-row {
        min-height: 25vmin;
    }
}

@media only screen and (max-width: 812px) {
    .form-row {
        min-height: 25vmin;
    }
}
</style>

<script>

// Update form validaiton
var UpdateForm = {
    name: null,
    current_password: null,
    password: null,
    password_confirmation: null,
    old: {
        name: "{{ old('name') ?? auth()->user()->name }}"
    },

    // Regex for password
    password_regex: function() {
        return /[\w\d\-\?\\\/\ \-\_\!\@\#\$\%\^\&\*\~\`\+\=\(\)\{\}\[\]\:\;\"\'\<\>\,\.]{8,25}/.test( arguments[ 0 ] );
    },

    // Name
    v_name: function() {
        return /[\w\-\ ]{5,255}/.test( this.name );
    },

    // Current password
    v_current_password: function() {
        return this.password_regex( this.current_password );
    },

    // New password
    v_password: function() {
        return this.password_regex( this.password ) && ( this.password !== this.current_password );
    },

    // Password confirmation
    v_password_confirmation: function() {
        return this.password_confirmation === this.password;
    },

    // Error message
    errorMsg: function( target, msg ) {
        $( target ).text( msg );
    },

    // Mark bordes red for a failure
    errorBorder: function() {
        $( '#updateForm #name, #updateForm #current_password, #updateForm #password, #updateForm #password_confirmation' ).addClass( 'w3-border-red' );
    },

    // Update method
    update: function() {
        this.name = $( '#updateForm #name' ).val();
        this.current_password = $( '#updateForm  #current_password' ).val();
        this.password = $( '#updateForm  #password' ).val();
        this.password_confirmation = $( '#updateForm  #password_confirmation' ).val();

        if ((
            !this.name ||
            this.name == this.old.name
        ) && (
            !this.current_password ||
            !this.password ||
            !this.password_confirmation
        )) {
            this.errorBorder();

            return false;
        }

        // Name
        if (
            this.name &&
            this.name != this.old.name
        ) {
            if ( !this.v_name() ) {
                $( '#updateForm #name' ).addClass( 'w3-border-red' );

                return false;
            }
        }

        // Password
        if (
            this.current_password  &&
            this.password &&
            this.password_confirmation
        ) {
            if (
                !this.v_current_password() ||
                !this.v_password() ||
                !this.v_password_confirmation()
            ) {
                $( '#updateForm #current_password, #updateForm #password, #updateForm #password_confirmation' ).addClass( 'w3-border-red' );

                return false;
            }
        }

        document.querySelector( "#updateForm" ).submit();
    }
};

$( document ).ready( function() {
    $( '#updateForm input' ).change( function( event ) {
        if ( $( this ).hasClass( 'w3-border-red' )) {
            $( this ).removeClass( 'w3-border-red' );
        }
    });
} );

</script>
@endpush

<section class="w3-row">

    <div class="w3-col s12 m4 l3 w3-padding">
        <h3>{{ __('cpanel.users-panel') }}</h3>
    </div>

    <div class="w3-col s12 m8 l9 w3-padding w3-border-left" style="margin-bottom: 5vh;">
        <h3>{{ __('cpanel.update-user') }}</h3>

        <form id="updateForm" action="{{ route('cpanel.update') }}" method="post" style="max-width: 512px;">

            @csrf
            @method('put')

            <fieldset form="updateForm" class="w3-padding w3-margin-bottom w3-round-large" dir="rtl">
                <legend>{{ __('cpanel.email') ." & ". __('cpanel.name') }}</legend>

                <div class="form-row" dir="ltr">
                    <strong>{{ __('cpanel.email') }}</strong>
                    <p>{{ auth()->user()->email }}</p>
                </div>

                <div class="form-row" dir="ltr">
                    <label for="name"><strong>{{ __('cpanel.name') }}</strong></label>
                    <input type="text" name="name" id="name" class="w3-input w3-margin-bottom w3-hover-pale-red" value="{{ old('name') ?? auth()->user()->name }}" />

                    <div class="w3-small" id="nameMsgs">
                        {{ __('cpanel.rules.name') }}
                    </div>
                </div>
            </fieldset>

            <fieldset form="updateForm" class="w3-padding w3-margin-bottom w3-round-large" dir="rtl">
                <legend>{{ __('cpanel.password') }}</legend>

                <div class="form-row" dir="ltr">
                    <label for="current_password"><strong>{{ __('cpanel.current_password') }}</strong></label>
                    <input type="password" name="current_password" id="current_password" class="w3-input w3-margin-bottom w3-hover-pale-red" />
                    <div class="w3-small w3-text-red" id="currentPasswordMsgs"></div>
                </div>

                <div class="form-row" dir="ltr">
                    <label for="password"><strong>{{ __('cpanel.new_password') }}</strong></label>
                    <input type="password" name="password" id="password" class="w3-input w3-margin-bottom w3-hover-pale-red" />
                    <div class="w3-small w3-text-red" id="currentPasswordMsgs"></div>
                </div>

                <div class="form-row" dir="ltr">
                    <label for="password_confirmation"><strong>{{ __('cpanel.password-confirmation') }}</strong></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w3-input w3-margin-bottom w3-hover-pale-red" />
                    <div class="w3-small w3-text-red" id="passwordConfirmationMsgs"></div>
                </div>
            </fieldset>

            <footer class="w3-bar">
                <button type="button" onclick="UpdateForm.update();" class="w3-button w3-bar-item w3-red w3-tooltip">
                    <span class="fa fa-arrow-right w3-text w3-animate-zoom"></span> Save
                </button>
                <button type="reset" class="w3-button w3-bar-item w3-pale-blue w3-tooltip" />
                    <span class="fa fa-truck w3-text w3-animate-zoom"></span> Reset
                </button>
            </footer>
        </form>
    </div>

</section>