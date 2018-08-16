@extends('layouts.app-plain') @section('content')
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto p-0">
            <div class="auth-form-dark text-left p-5">
                <img src="/images/btc-logo-2.png" alt="logo" class="d-block m-auto" style="width: 120px;">
                <h4 class="font-weight-light mt-4 text-center">Login</h4>
                <form method="POST" action="{{ route('login') }}" class="pt-4">
                    @csrf
                    <div class="form-group
                                {{ $errors->has('username') ? ' has-error' : '' }}
                                {{ $errors->has('email') ? ' has-error' : '' }}
                                ">
                        <input id="identity" type="text" class="form-control 
                                            {{ $errors->has('username') ? ' is-invali d' : '' }}
                                            {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                            name="identity" value="{{ old('identity') }}"
                            placeholder="Email/Username" required autofocus>
                        <i class="mdi mdi-account"></i>
                        @if ($errors->has('username'))
                        <span class="help-block invalid-feedback d-block">
                            <strong>Username & Password don't match</strong>
                        </span>
                        @endif
                        @if ($errors->has('email'))
                        <span class="help-block invalid-feedback d-block">
                            <strong>Email & Password don't match</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                        <i class="mdi mdi-eye"></i>
                        @if ($errors->has('password'))
                        <span class="help-block invalid-feedback d-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium">
                            Login
                        </button>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('password.request') }}" class="auth-link text-white">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
@endsection

@section('js')
    <script>

        $( document ).ready(function() {
            console.log('activate loader');
            $('button[type="submit"]').click(function() {
                $('.auth-form-dark').parent().css({
                    "background-image": "url('/images/logo-animated-460x190-2.gif')",
                    "background-size": "130%"
                })
            });
        });

    </script>
@endsection