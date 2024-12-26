@extends('backend.layouts.app')
@section('title', 'Edit Client')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('client') }}">Client</a></li>
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
                        <h4 class="box-title">Edit Information</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('client.edit',['client'=>$client->id]) }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" class="form-control" name="sort" placeholder="Enter Sort" value="{{ old('sort', $client->sort) }}" readonly>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Blog Name" value="{{ old('name', $client->name) }}">
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Link <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ old('link', $client->link) }}" name="link" class="form-control" id="link" placeholder="Enter Link">
                                            @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Short Description <span class="text-danger">*</span></label>
                                            <textarea rows="3" name="short_description" class="form-control" id="short_description">{{ old('description', $client->short_description) }}</textarea>
                                            @error('short_description')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Status <span class="text-danger">*</span></label>
                                            <div class="radio-list">
                                                <label class="radio-inline p-0 mr-10">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio1" value="1" {{ empty(old('radio')) ? ($errors->has('radio') ? '' : ($client->status == '1' ? 'checked' : '')) : (old('radio') == '1' ? 'checked' : '') }}>
                                                        <label for="radio1">Active</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio2" value="0" {{ empty(old('radio')) ? ($errors->has('radio') ? '' : ($client->status == '0' ? 'checked' : '')) : (old('radio') == '0' ? 'checked' : '') }}>
                                                        <label for="radio2">Inactive</label>
                                                    </div>
                                                </label>
                                            </div>
                                            @error('radio')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Logo <span class="text-danger">*</span></label>
                                            <input type="file" name="logo" class="form-control" id="logo_image">
                                            <br>
                                            @if(!empty($client->logo) && file_exists(public_path('pictures/client/client_logo/' . $client->logo)))
                                                <img src="{{ asset('pictures/client/client_logo/'. $client->logo) }}" id="image_preview" height="70" alt="{{ $client->name }}">
                                            @else
                                                <img src="" height="100px" id="image_preview" alt="">
                                            @endif
                                            @error('image')
                                            <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="w-100 font-weight-bold pb-2">Image  <span class="text-danger">(Width:1920px,Height:1080px)</span></label>
                                            <input type="file" class="form-control dropify" name="image" value="{{ $client->image }}" data-default-file="{{ (isset($client->image) && !empty($client->image) ? asset('pictures/client/'. $client->image) : '') }}" id="thumb_images"/>
                                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('client') }}" class="btn btn-danger">Cancel</a>
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
        #logo_image_field {
            display: none;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#logo_image_field').hide();

            $('#type_id').on('change', function () {
                const selectedType = $(this).val();
                if (selectedType == '1') {
                    $('#logo_image_field').show();
                } else {
                    $('#logo_image_field').hide();
                }
            });

            // Initialize Dropify
            $('.dropify').dropify();

            // Preview the selected logo image
            $('#logo_image').change(function() {
                // Get selected file
                var file = $(this)[0].files[0];

                // Create a new FileReader instance
                var reader = new FileReader();

                // Set the image file as the source of the FileReader instance
                reader.readAsDataURL(file);

                // When the file is loaded, display the preview image
                reader.onload = function(event) {
                    $("#image_preview").attr('src',event.target.result);
                }
            });
        });
    </script>
@endsection