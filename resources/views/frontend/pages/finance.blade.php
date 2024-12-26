@extends('frontend.layouts.master')
@section('title','Finance')
@section('page-title', 'Finance')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">Finance</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">Finance</a></li>
                                <li class="active text-gray-silver">Finance</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <section id="Project" class>--}}
{{--            <div class="container">--}}
{{--                <div class="section-content">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div id="grid" class="gallery-isotope grid-3 gutter clearfix">--}}
{{--                                @foreach($finances as $finance)--}}
{{--                                <div class="gallery-item">--}}
{{--                                    <div class="box-hover-effect">--}}
{{--                                        <div class="effect-wrapper">--}}
{{--                                            <div class="thumb">--}}
{{--                                                <img class="img-fullwidth" src="{{ asset('pictures/industries/'. $finance->image) }}" alt="project">--}}
{{--                                            </div>--}}
{{--                                            <div class="overlay-shade"></div>--}}
{{--                                            <div class="text-holder text-holder-middle">--}}
{{--                                                <div class="title text-center">--}}
{{--                                                    <h4 class="text-uppercase text-white mb-0">{{ $finance->name }}</h4>--}}
{{--                                                    <p class="text-gray-darkgray mt-5">{{ \Illuminate\Support\Str::words($finance->short_description, 5, '...') }}</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="icons-holder icons-holder-bottom-right">--}}
{{--                                                <div class="icons-holder-inner">--}}
{{--                                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">--}}
{{--                                                        <a href="{{ asset('pictures/industries/'. $finance->image) }}" data-lightbox-gallery="gallery1" title="Your Title Here"><i class="fa fa-camera"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <a class="hover-link" data-lightbox-gallery="gallery1-link" href="{{ asset('pictures/industries/'. $finance->image) }}">View more</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div >--}}
{{--        </section>--}}

        <section>
            <div class="container mt-30 mb-30 pt-30 pb-0">
                <div class="row multi-row-clearfix">
                    <div id="blog-posts-wrapper" class="blog-posts">
                        @foreach($finances as $finance)
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <article class="post clearfix maxwidth600 mb-30">
                                <div class="entry-header">
                                    <div class="post-thumb thumb"> <img src="{{ asset('pictures/industries/'. $finance->image) }}" alt class="img-responsive img-fullwidth"> </div>
                                </div>
                                <div class="entry-content border-1px p-20">
                                    <h5 class="entry-title mt-0 pt-0"><a href="{{ route('frontend.finance.details', ['slug'=>$finance->slug, 'type'=>$finance->type]) }}">{{ \Illuminate\Support\Str::words($finance->name, 5, '...') }}</a></h5>
                                    <ul class="list-inline entry-date font-12 mt-5">
                                        <li class="pr-0"><a class="text-theme-colored" href="#"><strong>Finance</strong></a></li>
                                    </ul>
                                    <p class="text-left mb-20 mt-15 font-13">{{ \Illuminate\Support\Str::words($finance->short_description, 15, '...') }}</p>
                                    <a class="btn btn-dark btn-theme-colored btn-xs btn-flat mt-0" href="{{ route('frontend.finance.details', ['slug'=>$finance->slug, 'type'=>$finance->type]) }}">Read more</a>
                                    <div class="clearfix"></div>
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
