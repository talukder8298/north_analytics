@extends('backend.layouts.app')
@section('title','Dashboard')

@section('content')
    <section class="content">
        <div class="row align-items-end">
            <div class="col-xl-9 col-12">
                <div class="box bg-primary-light pull-up">
                    <div class="box-body p-xl-0">
                        <div class="row align-items-center px-4 py-3">
                            <div class="col-12 col-lg-12">
                                <h2>{{ auth()->user()->name }}</h2>
                                <p class="text-dark mb-0 font-size-16">
                                    Your course Overcoming the fear of public speaking was completed by 11 New users this week!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="box bg-transparent no-shadow">
                    <div class="box-body p-xl-0 text-center">
                        <h3 class="px-30 mb-20">Have More<br>knoledge to share?</h3>
                        <button type="button" class="waves-effect waves-light btn-block btn btn-primary"><i class="fa fa-plus mr-15"></i> Cheate New Course</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box no-shadow mb-0 bg-transparent">
                    <div class="box-header no-border px-0">
                        <h4 class="box-title">Your Courses</h4>
                        <ul class="box-controls pull-right d-md-flex d-none">
                            <li>
                                <button class="btn btn-primary-light px-10">View All</button>
                            </li>
                            <li class="dropdown">
                                <button class="dropdown-toggle btn btn-primary-light px-10" data-toggle="dropdown" href="#" aria-expanded="false">Most Popular</button>
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item active" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Yesterday</a>
                                    <a class="dropdown-item" href="#">Last week</a>
                                    <a class="dropdown-item" href="#">Last month</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box bg-secondary-light pull-up" style="">
                    <div class="box-body">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center pr-2 justify-content-between">
                                <div class="d-flex">
                                    <span class="badge badge-primary mr-15">Active</span>
                                    <span class="badge badge-primary mr-5"><i class="fa fa-lock"></i></span>
                                    <span class="badge badge-primary"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-25 mb-5">It & software</h4>
                            <p class="text-fade mb-0 font-size-12">45 Days Left</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box bg-secondary-light pull-up" style="">
                    <div class="box-body">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center pr-2 justify-content-between">
                                <div class="d-flex">
                                    <span class="badge badge-dark mr-15">Finished</span>
                                </div>
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-25 mb-5">Programming</h4>
                            <p class="text-fade mb-0 font-size-12">1 Days Left</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box bg-secondary-light pull-up" style="">
                    <div class="box-body">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center pr-2 justify-content-between">
                                <div class="d-flex">
                                    <span class="badge badge-primary mr-15">Active</span>
                                    <span class="badge badge-primary mr-5"><i class="fa fa-lock"></i></span>
                                </div>
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-25 mb-5">Networking</h4>
                            <p class="text-fade mb-0 font-size-12">15 days Left</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="box bg-secondary-light pull-up" style="">
                    <div class="box-body">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center pr-2 justify-content-between">
                                <div class="d-flex">
                                    <span class="badge badge-warning-light mr-15">Paused</span>
                                    <span class="badge badge-warning-light mr-5"><i class="fa fa-lock"></i></span>
                                </div>
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-25 mb-5">Network Security</h4>
                            <p class="text-fade mb-0 font-size-12">21 Days Left</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-12">
                <div class="box">
                    <div class="box-body">
                        <p class="text-fade">Total Courses</p>
                        <h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ml-15 mr-5"></i> 2 New</small></h3>
                        <div id="charts_widget_2_chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-12">
                <div class="box">
                    <div class="box-body">
                        <p class="text-fade">Hours spent</p>
                        <h3 class="mt-0 mb-20">21 h 30 min <small class="text-danger"><i class="fa fa-arrow-down ml-25 mr-5"></i> 15%</small></h3>
                        <div id="charts_widget_1_chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Working Hours</h4>
                        <ul class="box-controls pull-right d-md-flex d-none">
                            <li class="dropdown">
                                <button class="dropdown-toggle btn btn-warning-light px-10" data-toggle="dropdown" href="#">Today</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item active" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Yesterday</a>
                                    <a class="dropdown-item" href="#">Last week</a>
                                    <a class="dropdown-item" href="#">Last month</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <div id="revenue5"></div>
                        <div class="d-flex justify-content-center">
                            <p class="d-flex align-items-center font-weight-600 mx-20"><span class="badge badge-xl badge-dot badge-warning mr-20"></span> Progress</p>
                            <p class="d-flex align-items-center font-weight-600 mx-20"><span class="badge badge-xl badge-dot badge-primary mr-20"></span> Done</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
