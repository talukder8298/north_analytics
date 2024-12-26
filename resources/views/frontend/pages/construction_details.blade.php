@extends('frontend.layouts.master')
@section('title','Construction Details')
@section('page-title', 'Construction Details')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">{{ $industry->name }}</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">Construction Details</a></li>
                                <li class="active text-gray-silver">Construction Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row mtli-row-clearfix">
                    <div class="col-sm-6 col-md-8 col-lg-8">
                        <div class="campaign bg-silver-light maxwidth500 mb-30">
                            <div class="thumb">
                                <img src="{{ asset('pictures/industries/'. $industry->image) }}" alt>
                                <div class="campaign-overlay"></div>
                            </div>
                        </div>
                        <div class="event-details">
                            <div class="mt-20 mb-20">
                                {!! $industry->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="sidebar sidebar-right mt-sm-30">
                            <div class="widget">
                                <h5 class="widget-title line-bottom">Latest Construction</h5>
                                <ul class="list-divider list-border list check">
                                    @foreach($industries as $industry)
                                    <li><a class="text-theme-colored" href="{{ route('frontend.finance.details', ['slug'=>$industry->slug, 'type'=>$industry->type]) }}">{{ $industry->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget-title line-bottom">Latest Insight</h5>
                                <div class="latest-posts">
                                    @foreach($blogs as $blog)
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img src="{{ asset('pictures/blog/'.$blog->image) }}" width="70px" alt></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="{{ route('blog_details',['slug'=>$blog->slug]) }}">{{ \Illuminate\Support\Str::words($blog->name, 5, '...') }}</a></h5>
                                            <p>{{ \Illuminate\Support\Str::words($blog->short_description, 10, '...') }}</p>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-lighter">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i class="fa fa-thumb-tack text-theme-colored2 mr-10"></i>Related <span class="text-theme-colored2">Construction</span></h3>
                            <div class="owl-carousel-3col">
                                @foreach($industries as $industry)
                                <div class="item">
                                    <div class="gallery-item select1">
                                        <div class="box-hover-effect">
                                            <div class="effect-wrapper">
                                                <div class="thumb">
                                                    <img class="img-fullwidth" src="{{ asset('pictures/industries/'. $industry->image) }}" alt="project">
                                                </div>
                                                <div class="overlay-shade"></div>
                                                <div class="text-holder text-holder-middle">
                                                    <div class="title text-center">
                                                        <h4 class="text-uppercase text-white mb-0"><a class="text-white" href="{{ route('frontend.finance.details', ['slug'=>$industry->slug, 'type'=>$industry->type]) }}">{{ \Illuminate\Support\Str::words($industry->name, 5, '...') }}</a></h4>
                                                        <p class="text-gray-darkgray mt-5">{{ \Illuminate\Support\Str::words($industry->short_description, 6, '...') }}</p>
                                                    </div>
                                                </div>
                                                <div class="icons-holder icons-holder-bottom-right">
                                                    <div class="icons-holder-inner">
                                                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                            <a href="{{ asset('pictures/industries/'. $industry->image) }}" data-lightbox-gallery="gallery1" title="Your Title Here"><i class="fa fa-camera"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="hover-link" data-lightbox-gallery="gallery1-link" href="{{ asset('pictures/industries/'. $industry->image) }}">View more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
