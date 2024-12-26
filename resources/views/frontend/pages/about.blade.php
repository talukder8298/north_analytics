@extends('frontend.layouts.master')
@section('title','About')
@section('page-title', 'About')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">About</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">About</a></li>
                                <li class="active text-gray-silver">About</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class>
            <div class="container">
                <div class="section-content">
                    <div class="row features-style1">
                        <div class="col-md-7">
                            <h2 class="mt-0 text-theme-colored">Doing the <span class="text-theme-colored2">right thing</span>, at the right time Grow Up Your Business</h2>
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
                        </div>
                        <div class="col-md-5">
                            <div class="text-center">
                                <canvas id="lineChart" width="500" height="500"></canvas>
                            </div>
                            <div class="clear"></div>
                            <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">
                                // Line Chart
                                var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
                                var lineChartData = {
                                    labels : ["January","February","March","April","May","June","July"],
                                    datasets : [
                                        {
                                            label: "My First dataset",
                                            fillColor : "rgba(220,220,220,0.2)",
                                            strokeColor : "rgba(220,220,220,1)",
                                            pointColor : "rgba(220,220,220,1)",
                                            pointStrokeColor : "#fff",
                                            pointHighlightFill : "#fff",
                                            pointHighlightStroke : "rgba(220,220,220,1)",
                                            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                                        },
                                        {
                                            label: "My Second dataset",
                                            fillColor : "rgba(151,187,205,0.2)",
                                            strokeColor : "rgba(151,187,205,1)",
                                            pointColor : "rgba(151,187,205,1)",
                                            pointStrokeColor : "#fff",
                                            pointHighlightFill : "#fff",
                                            pointHighlightStroke : "rgba(151,187,205,1)",
                                            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                                        }
                                    ]
                                }


                                //window load
                                window.onload = function(){
                                    var chart_lineChart = document.getElementById("lineChart").getContext("2d");
                                    window.myLine = new Chart(chart_lineChart).Line(lineChartData, {
                                        responsive: true
                                    });
                                }
                            </script>
                            <script src="{{ asset('frontend/assets/js/chart.js') }}"></script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-silver-light">
            <div class="container pb-60">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h2 class="text-uppercase line-bottom-double-line-centered mt-0">Our <span class="text-theme-colored2">Category</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati</p>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row mb-sm-30">
                                @foreach($categories as $category)
                                <div class="col-sm-6 col-md-6">
                                    <div class="service-box icon-box iconbox-theme-colored bg-white p-30 mb-30 border-1px">
                                        <a class="icon icon-dark border-left-theme-colored2-3px pull-left flip mb-0 mr-0 mt-5" href="#">
                                            <i class="fa fa-line-chart"></i>
                                        </a>
                                        <div class="icon-box-details">
                                            <h4 class="icon-box-title m-0 mb-5">{{ \Illuminate\Support\Str::words($category->name, 3, '...') }}</h4>
                                            <p class="text-gray mb-0">{{ \Illuminate\Support\Str::words($category->description, 5, '...') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-30 mt-0 bg-theme-colored">
                                <h3 class="title-pattern mt-0"><span class="text-white">Request A<span class="text-theme-colored2"> Call Back</span></span></h3>
                                <form id="reservation_form" name="reservation_form" class="reservation-form mt-20" method="post" action="https://html.kodesolution.com/2017/konsultplus-html/demo/includes/reservation.php">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group mb-20">
                                                <input placeholder="Enter Name" type="text" id="reservation_name" name="reservation_name" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-20">
                                                <input placeholder="Email" type="text" id="reservation_email" name="reservation_email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-20">
                                                <input placeholder="Phone" type="text" id="reservation_phone" name="reservation_phone" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-20">
                                                <div class="styled-select">
                                                    <select id="person_select" name="person_select" class="form-control" required>
                                                        <option value>Choose Subject</option>
                                                        <option value="Subject-1">Subject-1</option>
                                                        <option value="Subject-2">Subject-2</option>
                                                        <option value="Subject-3">Subject-3</option>
                                                        <option value="Subject-4">Subject-4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-20">
                                                <input name="Date Of Birth" class="form-control required date-picker" type="text" placeholder="Date Of Birth" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea placeholder="Enter Message" rows="3" class="form-control required" name="form_message" id="form_message" aria-required="true"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mb-0 mt-10">
                                                <input name="form_botcheck" class="form-control" type="hidden" value>
                                                <button type="submit" class="btn btn-colored btn-theme-colored2 text-white btn-lg btn-block" data-loading-text="Please wait...">Submit Request</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    $("#reservation_form").validate({
                                        submitHandler: function(form) {
                                            var form_btn = $(form).find('button[type="submit"]');
                                            var form_result_div = '#form-result';
                                            $(form_result_div).remove();
                                            form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                                            var form_btn_old_msg = form_btn.html();
                                            form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                                            $(form).ajaxSubmit({
                                                dataType:  'json',
                                                success: function(data) {
                                                    if( data.status == 'true' ) {
                                                        $(form).find('.form-control').val('');
                                                    }
                                                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                                                    $(form_result_div).html(data.message).fadeIn('slow');
                                                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                                                }
                                            });
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
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
    </div>
@endsection
