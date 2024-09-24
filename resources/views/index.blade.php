@extends('layouts.master')

@section('content')
<div class="banner-bg bg_img" data-background="assets/images/banner/banner-bg.jpg">
    <div class="banner-bg-shape"><img src="assets/images/banner/banner-shape.png" alt="banner"></div>
    <div class="round-1">
        <img src="assets/images/banner/01.png" alt="banner">
    </div>
    <div class="round-2">
        <img src="assets/images/banner/02.png" alt="banner">
    </div>
</div>
<div class="container">

    <div class="banner-content">
        <h3 class="cate">SHORTEN URLS AND</h3>
        <p>Transforming long, ugly links into Shorten URLs</p>
    </div>
    <div class="banner-form-group">
        @if(session('success'))
        <div class="alert alert-success subtitle" style="background: -webkit-linear-gradient(-100deg, #2d38e1 0%, #03c6fc 84%); color:#fff" role="alert">
            {!! session('success') !!}
        </div>
        @endif
        <h3 class="subtitle">Shorten URL Is Just Simple</h3>
        <form action="{{ url('/shorten') }}" method="POST" class="banner-form">
            @csrf
            <input type="url" id="original_url" name="original_url" placeholder="Your URL here" required>
            <button type="submit">Shorten <i class="flaticon-startup"></i></button>
        </form>
        <div class="banner-counter">
            <div class="counter-item">
                <h2 class="counter-title"><span class="counter">{{$totalClickCountToday}}</span>+</h2>
                <p>Links clicked per day</p>
            </div>
            <div class="counter-item">
                <h2 class="counter-title"><span class="counter">{{$totalUrls}}</span>+</h2>
                <p>Shortened links in total</p>
            </div>
            <div class="counter-item">
                <h2 class="counter-title"><span class="counter">{{$totalUsers}}</span>+</h2>
                <p>Happy users registered</p>
            </div>
        </div>
    </div>
</div>
@endsection