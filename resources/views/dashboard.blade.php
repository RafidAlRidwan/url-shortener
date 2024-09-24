@extends('layouts.master')

@section('content')


<div class="publisher-section mt-5">
  <div class="container">
    <div class="row mb-30-none justify-content-center mt--150">

      <div class="col-md-6 col-lg-4">
        <div class="publisher-item">
          <div class="publisher-inner">

            <h4 class="title">My Dashboard</h4>
            <p>Tracking the number of times each short URL is accessed</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<section class="payout-section padding-top padding-bottom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8">
        <div class="section-header mw-100">
          <h5 class="cate">My URLS</h5>
          <h2 class="title">We offer you the best</h2>
        </div>
      </div>
    </div>

    <table class="table borderd table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Real URL</th>
          <th scope="col">Short URL</th>
          <th scope="col">Count</th>
        </tr>
      </thead>
      <tbody>
        @if(count($urls) > 0)
        @foreach($urls as $url)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$url->original_url}}</td>
          <td><a href="{{url('form/'.$url->short_url)}}">{{url('form/'.$url->short_url)}}</a></td>
          <td>{{$url->click_count}}</td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
</section>

@endsection