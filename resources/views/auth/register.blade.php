@extends('layouts.app-plain')

@section('content')
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth register-full-bg">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-dark text-left pt-3 pb-4 pr-5 pl-5">
                <h2 class="font-weight-light mt-4 text-center">Register</h2>
                <form method="POST" action="{{ route('register') }}" class="pt-4">
                    @csrf
                    <div class="form-group row">
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder = "First name" required autofocus>
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder = "Username" required>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder = "Email Address" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder = "Password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder = "Confirm Password" required>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium">
                            Register
                        </button>
                    </div>

                    <div class="mt-3 text-center">
                        <a href="/login" class="auth-link text-white">Login?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
