@extends('admin.layouts.layout');
@section('content')

      <section class="section">
        <div class="section-header">
          <h1>Dashboard</h1>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary flex items-center justify-center">
                <i class="fa-solid fa-blog"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Blogs</h4>
                </div>
                <div class="card-body">
                  {{$blogCount}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger flex items-center justify-center">
                <i class="fa-regular fa-thumbs-up"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Skills</h4>
                </div>
                <div class="card-body">
                  {{$skillCount}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning flex items-center justify-center">
                <i class="far fa-file"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Portfolio</h4>
                </div>
                <div class="card-body">
                 {{$portfolioCount}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success flex items-center justify-center">
                <i class="fa-solid fa-star"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Feedbacks</h4>
                </div>
                <div class="card-body">
                  {{$feedback}}
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
  
@endsection