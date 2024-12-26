@extends('frontend.layouts.master')
@section('title','Insight')
@section('page-title', 'Insight')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">Insight</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">Insight</a></li>
                                <li class="active text-gray-silver">Page Title</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="news">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-sm-6 col-md-3">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="{{ asset('pictures/blog/'.$blog->image) }}" alt class="img-responsive img-fullwidth">
                                    </div>
                                    <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                                        @php
                                            $createDate = \Carbon\Carbon::parse($blog->create_date);
                                        @endphp
                                        <ul>
                                            <li class="font-16 text-white font-weight-600">{{ $createDate->day }}</li>
                                            <li class="font-12 text-white text-uppercase">{{ $createDate->format('M') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="entry-content p-15 pt-10 pb-10">
                                    <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                        <div class="media-body pl-0">
                                            <div class="event-content pull-left flip mt-20">
                                                <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{ route('blog_details',['slug'=>$blog->slug]) }}">{{ \Illuminate\Support\Str::words($blog->name, 6, '...') }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-5">{{ \Illuminate\Support\Str::words($blog->short_description, 8, '...') }}<a class="text-theme-colored2 font-12 ml-5" href="{{ route('blog_details',['slug'=>$blog->slug]) }}"> View Details</a></p>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
