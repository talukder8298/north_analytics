@extends('backend.layouts.app')
@section('title', 'Add Slider')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Create</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Slider</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Slider Information</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('slider.add') }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Sort <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="sort" placeholder="Enter Sort" value="{{ old('sort',$maxSort + 1) }}" readonly>
                                            @error('sort')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter Slider Title" value="{{ old('title') }}">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Sub Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Sub Title" name="sub_title" value="{{ old('sub_title') }}">
                                            @error('sub_title')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Status <span class="text-danger">*</span></label>
                                            <div class="radio-list">
                                                <label class="radio-inline p-0 mr-10">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio1" value="1" {{ old('radio') == '1' ? 'checked' : '' }}>
                                                        <label for="radio1">Active</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio2" value="0" {{ old('radio') == '0' ? 'checked' : '' }}>
                                                        <label for="radio2">Inactive</label>
                                                    </div>
                                                </label>
                                            </div>
                                            @error('radio')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>

                            <div class="box mt-20">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="w-100 font-weight-bold pb-2">Image  <span class="text-danger">(Width:1920px,Height:1080px)</span></label>
                                        <input type="file" class="form-control dropify" name="image" id="thumb_images" />
                                    </div>
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('slider') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <style>
        .dropify-wrapper .dropify-message p {
            line-height: 51px !important;
            font-size: 26px !important;
            color: #c8c7c7 !important;
            text-align: center;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endsection
