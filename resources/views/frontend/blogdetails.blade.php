@extends('frontend.layouts.layout')
@section('content')
    <header class="site-header parallax-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <h2 class="title">Blog Detail</h2>
                </div>
                <div class="col-sm-4">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="blog-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="head-title">{{ $blog->title }}</h2>
                    <div class="blog-meta">
                        <div class="single-meta">
                            <div class="meta-title">Published</div>
                            <h4 class="meta-value"><a
                                    href="javascript:void(0)">{{ date('d M, Y', strtotime($blog->created_at)) }}</a></h4>
                        </div>
                        <div class="single-meta">
                            <div class="meta-title">Category</div>
                            <h4 class="meta-value"><a href="javascript:void(0">{{ $blog->getCategory->name }}</a></h4>
                        </div>
                    </div>
                    <figure class="image-block">
                        <img src="{{ asset($blog->image) }}" style="img-fix" alt="">
                    </figure>
                    <div class="description">
                        {!! $blog->description !!}
                    </div>
                    <div class="single-navigation">
                        @if ($previousPost)
                            <a href="{{ route('show.blog', $previousPost->id) }}" class="nav-link"><span class="icon"><i
                                        class="fal fa-angle-left"></i></span><span
                                    class="text">{{ $previousPost->title }}</span></a>
                        @endif

                        @if ($nextPost)
                            <a href="{{ route('show.blog', $nextPost->id) }}" class="nav-link"><span
                                    class="text">{{ $nextPost->title }}</span><span class="icon"><i
                                        class="fal fa-angle-right"></i></span></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
