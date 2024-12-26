@extends('frontend.layouts.master')
@section('title','Blog')
@section('page-title', 'Blog')

@section('content')
    <section class="divider">
        <div class="container">
            <div class="row pt-30">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20">
                                <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Our Office Location</h5>
                                    <p>#405, Lan Streen, Los Vegas, USA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20">
                                <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Contact Number</h5>
                                    <p>+325 12345 65478</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20">
                                <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Email Address</h5>
                                    <p><a href="https://html.kodesolution.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c6b5b3b6b6a9b4b2a386bfa9b3b4a2a9abafa8e8a5a9ab">[email&#160;protected]</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20">
                                <a class="media-left pull-left" href="#"> <i class="fa fa-skype text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Make a Video Call</h5>
                                    <p>ThemeMascotSkype</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="line-bottom mt-0 mb-30">Interested in discussing?</h3>
                    <form id="contact_form" name="contact_form" class action="{{ route('contact_us') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name <small>*</small></label>
                                    <input name="name" class="form-control" type="text" placeholder="Enter Name">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email <small>*</small></label>
                                    <input name="email" class="form-control email" type="email" placeholder="Enter Email">
                                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Subject <small>*</small></label>
                                    <input name="subject" class="form-control" type="text" placeholder="Enter Subject">
                                    @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" class="form-control" type="text" placeholder="Enter Phone">
                                    @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Enter Message"></textarea>
                            @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5">Send your message</button>
                            <a href="{{ url()->current() }}" class="btn btn-default btn-flat btn-theme-colored"><i class="fas fa-sync-alt"></i> Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid pt-0 pb-0">
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5456.163483134849!2d144.95177475051227!3d-37.81589041361766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121+King+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2sbd!4v1556130803137!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </section>
@endsection
