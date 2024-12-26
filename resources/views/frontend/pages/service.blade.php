@extends('frontend.layouts.master')
@section('title','Service')
@section('page-title', 'Service')

@section('content')
    <div class="main-content">
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/assets/images/bg/slide1.jpg') }}">
            <div class="container pt-70 pb-20">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">Service</h2>
                            <ol class="breadcrumb text-left text-black mt-10">
                                <li class=" text-white"><a href="#">Home</a></li>
                                <li class=" text-white"><a href="#">Service</a></li>
                                <li class="active text-gray-silver">Service</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class>
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        @foreach($services as $service)
                        <div class="col-md-4 col-sm-6">
                            <div class="project mb-20">
                                <div class="thumb">
                                    <img class="img-fullwidth" src="{{ asset('pictures/service/'. $service->image) }}" alt>
                                    <div class="hover-link">
                                        <a href="{{ route('frontend.services.details', ['slug'=>$service->slug]) }}"><i class="fa fa-arrows"></i></a>
                                    </div>
                                </div>
                                <h3 class="text-theme-colored"><a href="{{ route('frontend.services.details', ['slug'=>$service->slug]) }}">{{ \Illuminate\Support\Str::words($service->name, 4, '...') }}</a></h3>
                                <p>{{ \Illuminate\Support\Str::words($service->short_description, 6, '...') }}</p>
                                <a href="{{ route('frontend.services.details', ['slug'=>$service->slug]) }}" class="btn btn-sm btn-theme-colored2 text-white">Read more</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
