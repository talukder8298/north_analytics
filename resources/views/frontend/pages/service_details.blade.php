@extends('frontend.layouts.master')
@section('title','Service Details')
@section('page-title', 'Service Details')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">{{ $service->name }}</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">Service Details</a></li>
                                <li class="active text-gray-silver">Service Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-pull-right mt-30">
                    <div class="single-service">
                        <img src="{{ asset('pictures/service/'. $service->image) }}" alt>
                        <h3 class="text-theme-colored line-bottom text-theme-colored">{{ $service->name }}</h3>
                        <p>{!! $service->description !!}</p>

                        <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Marketing Strategies</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-20">
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-pie-chart text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Top Ranking Market Share</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines. </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-paper-plane text-theme-colored2"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Business Saturation and Popularity</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines. </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-star text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">We Support Our Clients One Working Days</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center mt-20">
                                    <canvas id="barChart" width="500" height="500"></canvas>
                                </div>
                                <div class="clear"></div>
                                <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">
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
                        <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Business Strategies</h4>
                        <ul id="myTab" class="nav nav-tabs boot-tabs">
                            <li class="active"><a href="#small" data-toggle="tab">Challenge</a></li>
                            <li><a href="#medium" data-toggle="tab">Expansion</a></li>
                            <li><a href="#large" data-toggle="tab">Solution</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content bg-silver-light">
                            <div class="tab-pane fade in active" id="small">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="mt-0 text-theme-colored">Doing the <span class="text-theme-colored2">right thing</span>, at the right time Grow Up Your Business</h3>
                                        <p class>Business is a marketing discipline focused on growing visibility in organic (non-paid) search engine results.encompasses both the technical and creative elements required </p>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="piechart-block text-center">
                                            <div class="piechart" data-barcolor="#202C45" data-trackcolor="#1196CC" data-scalecolor="#1196CC" data-percent="75" data-linewidth="25" data-size="150">
                                                <span class="percent"></span>
                                            </div>
                                            <h5>Porject Completed</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="medium">
                                <div class="mt-20">
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-line-chart text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Top Ranking Market Share</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines creative elements required to improve. </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-line-chart text-theme-colored2"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Business Saturation and Popularity</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines creative elements required to improve. </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-line-chart text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">We Support Our Clients One Working Days</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines creative elements required to improve. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="large">
                                <div class="mt-20">
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-line-chart text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Top Ranking Market Share</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines creative elements required to improve. </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-line-chart text-theme-colored2"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">Business Saturation and Popularity</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines creative elements required to improve. </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="left media p-0 mb-10">
                                        <a href="#" class="pull-left flip"><i class="fa fa-2x fa-line-chart text-theme-colored"></i></a>
                                        <div class="media-body">
                                            <h5 class="mt-0">We Support Our Clients One Working Days</h5>
                                            <p>encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines creative elements required to improve. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mt-30">
                    <div class="sidebar sidebar-left mt-sm-30 ml-40">
                        <div class="widget">
                            <h4 class="widget-title line-bottom">Service <span class="text-theme-colored2">List</span></h4>
                            <div class="services-list">
                                <ul class="list list-border">
                                    @foreach($services as $service)
                                        <li><a href="{{ route('frontend.services.details', ['slug'=>$service->slug]) }}">{{ $service->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
