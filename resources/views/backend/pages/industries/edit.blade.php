@extends('backend.layouts.app')
@section('title', 'Edit Industries')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Create</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('industries') }}">Industries</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                        <h4 class="box-title">Industries Information</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('industries.edit',['industries' => $industries->id]) }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Sort <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="sort" placeholder="Enter Sort" value="{{ old('sort', $industries->sort) }}" readonly>
                                            @error('sort')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Blog Name" value="{{ old('name', $industries->name) }}">
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Category <span class="text-danger">*</span></label>
                                            <select id="type" name="type" class="form-control type">
                                                <option value="">Select category</option>
                                                <option value="1" {{ $industries->type == 1 ? 'selected' : '' }}>Finance</option>
                                                <option value="2" {{ $industries->type == 2 ? 'selected' : '' }}>Construction</option>
                                            </select>
                                            @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Link <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="link" value="{{ old('link', $industries->link) }}">
                                            @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Short Description <span class="text-danger">*</span></label>
                                            <textarea rows="3" name="short_description" class="form-control" id="short_description">{{ old('short_description', $industries->short_description) }}</textarea>
                                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Long Description <span class="text-danger">*</span></label>
                                            <textarea rows="4" name="description" class="form-control" id="description">{{ old('description', $industries->description) }}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="w-100 font-weight-bold pb-2">Image  <span class="text-danger">(Width:1920px,Height:1080px)</span></label>
                                            <input type="file" class="form-control dropify" name="image" value="{{ $industries->image }}" data-default-file="{{ (isset($industries->image) && !empty($industries->image) ? asset('pictures/industries/'. $industries->image) : '') }}" id="thumb_images"/>
                                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Status <span class="text-danger">*</span></label>
                                            <div class="radio-list">
                                                <label class="radio-inline p-0 mr-10">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio1" value="1" {{ empty(old('radio')) ? ($errors->has('radio') ? '' : ($industries->status == '1' ? 'checked' : '')) : (old('radio') == '1' ? 'checked' : '') }}>
                                                        <label for="radio1">Active</label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="radio" id="radio2" value="0" {{ empty(old('radio')) ? ($errors->has('radio') ? '' : ($industries->status == '0' ? 'checked' : '')) : (old('radio') == '0' ? 'checked' : '') }}>
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

                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('industries') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
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
    <script src="https://cdn.jsdelivr.net/npm/quill/dist/quill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            $('#description').summernote({
                height: 150, // Set editor height
                placeholder: 'Write something here...',
            });
            $('#category_id').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endsection
