@extends('layouts.app-plain')

@section('content')
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth reset-full-bg">
    <div class="row w-100">
        <div class="col-lg-4 mx-auto p-0">
            <div class="auth-form-dark text-left p-5">
                <img src="/images/btc-logo-2.png" alt="logo" class="d-block m-auto" style="width: 120px;">
                <h4 class="font-weight-light mt-4 text-center">{{ __('Reset Password') }}</h4>
                <div role="alert" class="alert alert-fill-success mb-0">
                    <i class="icon-info icons mr-1" style="font-size: 12px;"></i> 
                    <span style="font-size: 12px;">To reset your password, type your email address below and we will send a link to your email where you can then change your password</span>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="pt-4">
                    @csrf
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" required autofocus>
                        <i class="icon-envelope icons"></i>
                        @if ($errors->has('email'))
                            <span class="help-block invalid-feedback d-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium">
                            Reset Password
                        </button>
                    </div>
                    <div class="mt-3 text-right mr-2">
                        <a href="{{ route('login') }}" class="auth-link text-white">Login Instead?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
@endsection
