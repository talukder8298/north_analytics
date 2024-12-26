@extends('frontend.layouts.master')
@section('title','Insight Details')
@section('page-title', 'Insight Details')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">Insight Details</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">Insight Details</a></li>
                                <li class="active text-gray-silver">Insight Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="blog-posts single-post">
                            <article class="post clearfix mb-0">
                                <div class="entry-header">
                                    <div class="post-thumb thumb"> <img src="{{ asset('pictures/blog/'.$blog->image) }}" alt class="img-responsive img-fullwidth"> </div>
                                </div>
                                <div class="entry-content">
                                    <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                        <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                            @php
                                                use Carbon\Carbon;
                                                $createDate = Carbon::parse($blog->create_date);
                                            @endphp
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">{{ $createDate->day }}</li>
                                                <li class="font-12 text-white text-uppercase">{{ $createDate->format('M') }}</li>
                                            </ul>
                                        </div>
                                        <div class="media-body pl-15">
                                            <div class="event-content pull-left flip">
                                                <h4 class="entry-title text-white text-uppercase m-0"><a href="#">{{ $blog->name }}</a></h4>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                                                <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                                            </div>
                                        </div>
                                    </div>
                                    {!! $blog->description !!}
                                </div>
                            </article>
                            <div class="tagline p-0 pt-20 mt-5">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="tags">
                                            <p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>Tags:</span> Law, Juggement, lawyer, Cases</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="share text-right">
                                            <p><i class="fa fa-share-alt text-theme-colored"></i> Share</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar sidebar-left mt-sm-30">
                            <div class="widget">
                                <h5 class="widget-title line-bottom">Categories</h5>
                                <div class="categories">
                                    <ul class="list list-border angle-double-right">
                                        @foreach($categories as $category)
                                        <li><a href="{{ route('category_wise_blog', ['id'=>$category->id]) }}">{{ $category->name }}<span>({{ $category->blogs->count() }})</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget-title line-bottom">Latest Insight</h5>
                                <div class="latest-posts">
                                    @foreach($latests as $latest)
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="{{ route('blog_details',['slug'=>$latest->slug]) }}"><img src="{{ asset('pictures/blog/'.$latest->image) }}" alt width="70px"></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="{{ route('blog_details',['slug'=>$latest->slug]) }}">{{ \Illuminate\Support\Str::words($latest->name, 5, '...') }}</a></h5>
                                            <p>{{ \Illuminate\Support\Str::words($latest->short_description, 7, '...') }}</p>
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
    </div>
@endsection
