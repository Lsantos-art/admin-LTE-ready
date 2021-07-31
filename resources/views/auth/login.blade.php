@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center mt-3">
    <div class="user_card mt-3 col-md-8">
        <div class="d-flex justify-content-center mt-3">
            <div class="brand_logo_container">
                <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">
            </div>
        </div>
        <div class="d-flex justify-content-center form_container">
            <form method="POST" action="{{ route('login') }}" class="col-md-8">
                @csrf
                <div class="input-group mb-3">
                    <label for="email">Email</label>
                    <div class="inputbox">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-2 inputbox">
                    <label for="password">Senha</label>
                    <div class="inputbox">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <i id="eye" class="fas fa-eye"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>

                        <label class="custom-control-label" for="customControlInline">
                            {{ __('Lembrar senha') }}
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="button" class="btn login_btn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <div class="d-flex justify-content-center links">
                Não tem uma conta? <a href="{{ route('register') }}" class="ml-2">Registrar-se</a>
            </div>
            <div class="d-flex justify-content-center links">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        $( "#eye" ).click(function() {
            if ($("#password").attr("type") == 'password') {
                $("#password").attr("type", "text");
                $("#eye").attr("class", "fas fa-eye-slash");
            }else {
                $("#password").attr("type", "password");
                $("#eye").attr("class", "fas fa-eye");
            }
        });
    </script>

@endsection
