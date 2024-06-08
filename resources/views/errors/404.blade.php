@extends('frontend.layouts.layout')


@section('content')
<header class="site-header parallax-bg">
  <div class="container">
      <div class="row d-flex align-items-center">
          <div class="col-sm-8">
              <h2 class="title">404</h2>
          </div>
          <div class="col-sm-4">
              <div class="breadcrumbs">
                  <ul>
                      <li><a href="{{url('/')}}">Home</a></li>
                      <li>404</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</header>

<section class="blog-details section-padding">
  <div class="container">
      <div class="row">
          <div id="notfound">
              <div class="notfound">
                  <div class="notfound-404">
                      <h1 style="
                        background-image: url({{asset('frontend/assets/images/bg.jpg')}})">Oops!</h1>
                  </div>
                  <h2>404 - Page not found</h2>
                  <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.
                  </p>
                  <a href="{{url('/')}}">Go To Homepage</a>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection