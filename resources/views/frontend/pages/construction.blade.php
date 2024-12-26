@extends('frontend.layouts.master')
@section('title','Construction')
@section('page-title', 'Construction')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">Construction</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">Construction</a></li>
                                <li class="active text-gray-silver">Construction</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container mt-30 mb-30 pt-30 pb-0">
                <div class="row multi-row-clearfix">
                    <div id="blog-posts-wrapper" class="blog-posts">
                        @foreach($constructions as $construction)
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <article class="post clearfix maxwidth600 mb-30">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb"> <img src="{{ asset('pictures/industries/'. $construction->image) }}" alt class="img-responsive img-fullwidth"> </div>
                                    </div>
                                    <div class="entry-content border-1px p-20">
                                        <h5 class="entry-title mt-0 pt-0"><a href="{{ route('frontend.finance.details', ['slug'=>$construction->slug, 'type'=>$construction->type]) }}">{{ \Illuminate\Support\Str::words($construction->name, 5, '...') }}</a></h5>
                                        <ul class="list-inline entry-date font-12 mt-5">
                                            <li class="pr-0"><a class="text-theme-colored" href="#"><strong>Construction</strong></a></li>
                                        </ul>
                                        <p class="text-left mb-20 mt-15 font-13">{{ \Illuminate\Support\Str::words($construction->short_description, 15, '...') }}</p>
                                        <a class="btn btn-dark btn-theme-colored btn-xs btn-flat mt-0" href="{{ route('frontend.finance.details', ['slug'=>$construction->slug, 'type'=>$construction->type]) }}">Read more</a>
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
