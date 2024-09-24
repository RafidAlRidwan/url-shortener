@extends('layouts.auth-master')

@section('content')
<div class="account-title text-center">
    <!-- <a href="index.html" class="back-home"><i class="fas fa-angle-left"></i><span>Back <span class="d-none d-sm-inline-block">To Cortaly</span></span></a> -->
    <a href="index.html" class="logo">
        <!-- <img src="assets/images/logo/logo.png" alt="logo"> -->
    </a>
</div>
<div class="account-wrapper">
    <div class="account-body">
        <h4 class="title mb-20">Registration Here</h4>
        <form action="{{ route('register.post') }}" method="POST" class="account-form">
            @csrf
            <div class="form-group">
                <label for="sign-up">Your Name </label>
                <input name="name" type="text" placeholder="Enter Your Name">
                @if($errors->has('email'))
                <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a name</label>
                @endif
            </div>
            <div class="form-group">
                <label for="sign-up">Your Email </label>
                <input name="email" type="email" placeholder="Enter Your Email">
                @if($errors->has('email'))
                <label id="email-error" class="error mt-2 text-danger" for="email">Please enter a email</label>
                @endif
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input name="password" type="password" placeholder="Enter Your Password">
                @if($errors->has('password'))
                <label id="password-error" class="error mt-2 text-danger" for="password">Please enter a password</label>
                @endif
            </div>
            <div class="form-group">
                <label for="pass">Confirm Password</label>
                <input name="password_confirmation" type="password" placeholder="Enter Your Password Again" id="pass">
                @if($errors->has('password_confirmation'))
                <label id="password-error" class="error mt-2 text-danger" for="password_confirmation">Please enter password again</label>
                @endif
            </div>
            <div class="form-group text-center">
                <button type="submit" class="mt-2 mb-2">Sign up</button>
            </div>
        </form>
    </div>
    <div class="or">
        <span>OR</span>
    </div>
    <div class="account-header pb-0">
        <span class="d-block mt-15">Already have an account? <a href="{{route('login')}}">Sign In</a></span>
    </div>
</div>
@endsection