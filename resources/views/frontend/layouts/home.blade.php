@extends('frontend.layouts.master')
@section('title','Home')
@section('page-title', 'Home')

@section('content')

    @include('frontend.layouts.slider')

    <!-- Service -->
    <section class="bg-silver-light">
        <div class="container">
            <div class="section-content text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase line-bottom-double-line-centered text-theme-colored mt-0">Our Services</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                    </div>
                </div>
                <div class="row mt-40">
                    @foreach($services as $service)
                        <div class="col-sm-6 col-md-4 maxwidth500 mb-sm-40">
                            <div class="project">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="{{ asset('pictures/service/'.$service->image) }} " alt>
                                    <div class="hover-link">
                                        <a href="{{ route('frontend.services.details', ['slug'=>$service->slug]) }}"><i class="fa fa-bar-chart"></i></a>
                                    </div>
                                </div>
                                <h3 class="text-theme-colored"><a href="{{ route('frontend.services.details', ['slug'=>$service->slug]) }}">{{ \Illuminate\Support\Str::words($service->name, 4, '...') }}</a></h3>
                                <p>{{ \Illuminate\Support\Str::words($service->short_description, 10, '...') }}</p>
                                <a href="{{ route('frontend.services.details', ['slug'=>$service->slug]) }}" class="btn btn-sm btn-theme-colored2 text-white">Read more</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-hover-effect play-button">
                            <div class="effect-wrapper">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="{{ asset('frontend/assets/images/about/5.jpg') }} " alt="project">
                                </div>
                                <div class="overlay-shade"></div>
                                <div class="text-holder text-holder-middle">
                                    <a href="https://www.youtube.com/watch?v=F3QpgXBtDeo" data-lightbox-gallery="youtube-video" title="Youtube Video"><img alt src="{{ asset('frontend/assets/images/play-button/s1.png') }} "></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-uppercase mt-0 mt-sm-30">The Different Financial Help For Grow Up Business</h2>
                        <h4 class="text-theme-colored">Lorem ipsum dolor sit amet soluta saepe odit error, maxime praesentium sunt udiandae!</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore atque officiis maxime suscipit expedita obcaecati nulla in ducimus iure quos quam recusandae eveniet fuga modi pariatur, eius vero. Ea vitae maiores.</p>
                        <div class="singnature mt-20">
                            <img src="{{ asset('frontend/assets/images/signature.png') }} " alt="img1">
                        </div>
                        <a href="#" class="btn btn-flat btn-colored btn-theme-colored mt-15 mr-15">Read More</a><a href="#" class="btn btn-flat text-white btn-colored btn-theme-colored2 mt-15">All Project</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section id="service" class="bg-lighter">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Top <span class="text-theme-colored2">Categories</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                @foreach($categories as $category)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box icon-box iconbox-theme-colored bg-white p-30 mb-30 border-1px">
                        <a class="icon icon-dark border-left-theme-colored2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                            <i class="fa fa-cubes"></i>
                        </a>
                        <div class="icon-box-details">
                            <h4 class="icon-box-title m-0 mb-5">{{ $category->name }}</h4>
                            <p class="text-gray mb-0">{{ \Illuminate\Support\Str::words($category->description, 10, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="divider parallax layer-overlay overlay-theme-colored-2" data-bg-img="images/bg/bh5.jpg" data-parallax-ratio="0.7">
        <div class="container">
            <div class="section-content text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mt-0 mb-50 text-white">We are always ahead <br> Professional Solutions for Your Business.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-smile mt-5 text-theme-colored2"></i>
                        <h2 data-animation-duration="2000" data-value="5248" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase mb-0">Happy Customers</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-note2 mt-5 text-theme-colored2"></i>
                        <h2 data-animation-duration="2000" data-value="1175" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase mb-0">Our Project</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                    <div class="funfact text-center">
                        <i class="pe-7s-users mt-5 text-theme-colored2"></i>
                        <h2 data-animation-duration="2000" data-value="252" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase mb-0">Team Members</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
                    <div class="funfact text-center">
                        <i class="pe-7s-cup mt-5 text-theme-colored2"></i>
                        <h2 data-animation-duration="2000" data-value="54" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
                        <h5 class="text-white text-uppercase mb-0">Awards Won</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industries -->
    <section id="Project" class="bg-lighter">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Our <span class="text-theme-colored2">Industries</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portfolio-filter font-alt text-center">
                            <a href="#" class="active" data-filter="*">All</a>
                            <a href="#finance" class data-filter=".finance">Finance</a>
                            <a href="#construction" class data-filter=".construction">Construction</a>
                        </div>
                        <div id="grid" class="gallery-isotope grid-3 gutter clearfix">
                            @foreach($industries as $industry)
                            <div class="gallery-item {{ $industry->type == 1 ? 'finance' : 'construction' }}">
                                <div class="box-hover-effect">
                                    <div class="effect-wrapper">
                                        <div class="thumb">
                                            <img class="img-fullwidth" src="{{ asset('pictures/industries/'. $industry->image) }}" alt="project">
                                        </div>
                                        <div class="overlay-shade"></div>
                                        <div class="text-holder text-holder-middle">
                                            <div class="title text-center">
                                                <h4 class="text-uppercase text-white mb-0"><a class="text-white" href="{{ route('frontend.finance.details', ['slug'=>$industry->slug, 'type'=>$industry->type]) }}">{{ $industry->name }}</a></h4>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div >
    </section>

    <!-- Member -->
    <section>
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Our <span class="text-theme-colored2">Members</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="team-members">
                    @foreach($members as $member)
                    <div class="col-sm-6 col-md-4">
                        <div class="team-member service-box maxwidth400 mb-sm-15">
                            <div class="team-thumb">
                                <img class="img-fullwidth mt-15" src="{{ asset('pictures/member/'. $member->image) }}" alt>
                            </div>
                            <div class="team-details text-center pt-20 pb-5">
                                <div class="member-biography">
                                    <h3 class="mt-0 text-theme-colored2">{{ $member->name }}</h3>
                                    <p class="mb-0">{{ \Illuminate\Support\Str::words($member->short_description, 6, '...') }}</p>
                                </div>
                                <ul class="styled-icons icon-circled icon-theme-colored pt-5">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="divider parallax layer-overlay overlay-theme-colored-2" data-bg-img="images/bg/bh5.jpg" data-parallax-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="call-to-action pt-20 pb-10">
                    <form method="post" action="{{ route('contact_us') }}">
                        @csrf
                        <div class="col-md-10">
                            <h2 class="text-white border-bottom mt-0 mb-10">Request A <span class="text-theme-colored2">Call</span> Back.</h2>
                            <p class="text-white mt-0">Business is a marketing discipline focused on growing visibility in organic search engine results.encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines</p>
                            <h4 class="text-white mt-20 mb-10">How Can We Help ?</h4>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group mb-15">
                                <input name="email" class="form-control email" type="email" placeholder="Enter Email">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="form-group mb-15">
                                <div class="styled-select">
                                    <input placeholder="Subject" type="text" id="subject" name="subject" class="form-control">
                                    @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <div class="form-group mb-15">
                                <input placeholder="Phone" type="text" id="phone" name="phone" class="form-control">
                                @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <div class="form-group mb-15">
                                <input name="date" class="form-control date-picker" type="text" placeholder="Reservation Date" aria-required="true">
                                @error('date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <div class="form-group mb-15 mt-0">
                                <button type="submit" class="btn text-white btn-lg btn-flat btn-theme-colored2 form-control" data-loading-text="Please wait...">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="bg-lighter">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="mt-0">Stocks <span class="text-theme-colored2">Market Research </span>Financial Report Analysis</h2>
                        @foreach($about->contents as $content)
                        <div class="mt-20">
                            <div class="left media p-0 mb-10"> <a href="#" class="pull-left flip"><i class="{{ $content->name }}"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $content->title }}</h5>
                                    <p>{{ $content->description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <a href="#" class="btn btn-md btn-theme-colored border-1px mt-10">Read More..</a>
                    </div>
                    <div class="col-md-5">
                        <div class="text-center">
                            <canvas id="barChart" width="500" height="500"></canvas>
                        </div>
                        <div class="clear"></div>
                        <script type="text/javascript">

                            // Bar Chart
                            var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
                            var barChartData = {
                                labels : ["January","February","March","April","May","June","July"],
                                datasets : [
                                    {
                                        fillColor : "rgba(216, 33, 50, 0.8)",
                                        strokeColor : "rgba(216, 33, 50, 0.8)",
                                        highlightFill: "rgba(0, 0, 0, 0.75)",
                                        highlightStroke: "rgba(0, 0, 0, 1)",
                                        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                                    },
                                    {
                                        fillColor : "rgba(151,187,205,0.5)",
                                        strokeColor : "rgba(151,187,205,0.8)",
                                        highlightFill : "rgba(151,187,205,0.75)",
                                        highlightStroke : "rgba(151,187,205,1)",
                                        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                                    }
                                ]

                            }


                            //window load
                            window.onload = function(){

                                var chart_barChart = document.getElementById("barChart").getContext("2d");
                                window.myBar = new Chart(chart_barChart).Bar(barChartData, {
                                    responsive : true
                                });
                            }
                        </script>

                        <script src="{{ asset('frontend/assets/js/chart.js') }}"></script>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client -->
    <section class="divider layer-overlay overlay-theme-colored-5" data-background-ratio="0.5" data-bg-img="images/bg/team-bg1.png">
        <div class="container pb-50">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="text-uppercase line-bottom-double-line-centered text-white mt-0">Happy <span class="text-theme-colored2">Clints</span> Says</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-10">
                    <div class="owl-carousel-2col" data-dots="true">
                        @foreach($clients as $client)
                        <div class="item">
                            <div class="testimonial pt-10">
                                <div class="thumb pull-left mb-0 mr-0 pr-20">
                                    <img class="img-thumbnail" width="75" alt src="{{ asset('pictures/client/'. $client->image) }}" style="width:100px !important;">
                                </div>
                                <div class="ml-100 ">
                                    <p class="text-white mt-0">{{ $client->short_description }}</p>
                                    <p class="author mt-10">- <span class="text-theme-colored2">Catherine Grace,</span> <small><em class="text-gray-lightgray">CEO apple.inc</em></small></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog/Insight -->
    <section id="blog" class="bg-silver-light">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Latest <span class="text-theme-colored2">Insights</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-3col owl-nav-top" data-nav="true">
                            @foreach($blogs as $blog)
                                <div class="item">
                                    <article class="post clearfix campaign mb-30">
                                        <div class="entry-header">
                                            <div class="post-thumb thumb">
                                                <img src="{{ asset('pictures/blog/'.$blog->image) }}" alt class="img-responsive img-fullwidth">
                                            </div>
                                            <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                                                <ul>
                                                    <li class="font-16 text-white font-weight-600">28</li>
                                                    <li class="font-12 text-white text-uppercase">Feb</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="entry-content p-20 border-bottom-2px border-theme-colored2 bg-white">
                                            <div class="entry-meta media mt-0 mb-10">
                                                <div class="media-body pl-0">
                                                    <div class="event-content pull-left flip">
                                                        <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="{{ route('blog_details',['slug'=>$blog->slug]) }}">{{ \Illuminate\Support\Str::words($blog->name, 6, '...') }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-5">{{ \Illuminate\Support\Str::words($blog->short_description, 12, '...') }}</p>
                                            <a class="btn btn-theme-colored2 btn-sm text-white" href="{{ route('blog_details',['slug'=>$blog->slug]) }}"> View Details</a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients -->
    <section class="clients bg-theme-colored2">
        <div class="container pt-10 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel-6col text-center">
                        @foreach($clients as $client)
                        <div class="item"> <a href="#"><img src="{{ asset('pictures/client/client_logo/'.$client->logo) }}" alt></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
