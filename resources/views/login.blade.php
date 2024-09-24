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
        <h4 class="title mb-20">Welcome To Login</h4>
        <form ction="{{ route('login.post') }}" method="POST" class="account-form">
            @csrf
            <div class="form-group">
                <label for="sign-up">Your Email </label>
                <input required name="email" type="text" placeholder="Enter Your Email " id="sign-up">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input required name="password" type="password" placeholder="Enter Your Password" id="pass">
            </div>
            @if($errors->any())
            <p style="color: #e60980; text-align: center; margin-bottom:10px"> {{$errors->first()}} </p>
            @endif
            <div class="form-group text-center">
                <button type="submit" class="mt-2 mb-2">Sign In</button>
            </div>
        </form>
    </div>
    <div class="or">
        <span>OR</span>
    </div>
    <div class="account-header pb-0">
        <span class="d-block mt-15">Don't have an account? <a href="{{route('register')}}">Sign Up Here</a></span>
    </div>
</div>
@endsection