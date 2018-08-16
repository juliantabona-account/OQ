@extends('layouts.app-plain')

@section('content')
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth reset-full-bg-2">
    <div class="row w-100">
        <div class="col-lg-5 mx-auto p-0">
            <div class="auth-form-dark text-left p-5">
                <img src="/images/btc-logo-2.png" alt="logo" class="d-block m-auto" style="width: 120px;">
                <h4 class="font-weight-light mt-4 text-center">{{ __('Reset Password') }}</h4>
                <div role="alert" class="alert alert-fill-success mb-0">
                    <i class="icon-info icons mr-1" style="font-size: 12px;"></i> 
                    <span style="font-size: 12px;">Great! You can now enter your new password. Make sure your password is more than 6 characters long and has both letters, number and symbols</span>
                </div>
                <form method="POST" action="{{ route('password.request') }}" class="pt-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" autocomplete="off" required autofocus>
                        <i class="icon-envelope icons"></i>
                        @if ($errors->has('email'))
                            <span class="help-block invalid-feedback d-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                        <i class="icon-lock icons"></i>
                        @if ($errors->has('password'))
                        <span class="help-block invalid-feedback d-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        <i class="icon-eye icons"></i>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
@endsection

