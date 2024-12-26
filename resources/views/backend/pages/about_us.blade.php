@extends('backend.layouts.app')
@section('title', 'About Us')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Update Information</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('service') }}">About Us</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Info</li>
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
                        <h4 class="box-title">About Us Information</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('about.update',['about'=> $about->id]) }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Title" value="{{ old('name', $about->name ?? '') }}">
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Short Description 1 <span class="text-danger">*</span></label>
                                            <textarea rows="3" name="short_description1" class="form-control" id="short_description1">{{ old('short_description1', $about->short_description1 ?? '') }}</textarea>
                                            @error('short_description1')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Short Description 2 <span class="text-danger">*</span></label>
                                            <textarea rows="3" name="short_description2" class="form-control" id="short_description2">{{ old('short_description2', $about->short_description2 ?? '') }}</textarea>
                                            @error('short_description2')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Long Description <span class="text-danger">*</span></label>
                                            <textarea rows="4" name="description" class="form-control" id="description">{{ old('description', $about->description ?? '') }}</textarea>
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
                                            <input type="file" class="form-control image" name="image" value="{{ $about->image?? '' }}" data-default-file="{{ (isset($about->image) && !empty($about->image) ? asset('pictures/about/'. $about->image) : '') }}" id="thumb_images"/>
                                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="w-100 font-weight-bold pb-2">Cover Image  <span class="text-danger">(Width:1920px,Height:1080px)</span></label>
                                            <input type="file" class="form-control cover_img" name="cover_img" value="{{ $about->cover_img ?? '' }}" data-default-file="{{ (isset($about->cover_img) && !empty($about->cover_img) ? asset('pictures/about/about_cover/'. $about->cover_img) : '') }}" id="thumb_images"/>
                                            @error('cover_img')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="image-uploads-container">
                                    <div class="image-upload-item">
                                        <div class="card-body image-inner-container">
                                            <div class="image-inner-list">
                                                @if($about->contents && $about->contents->isNotEmpty())
                                                    @foreach($about->contents as $content)
                                                        <div class="row content-block" data-id="{{ $content->id }}">
                                                            <div class="col-md-11">
                                                                <div class="form-group">
                                                                    <label class="font-weight-700 font-size-16">Icon Name <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="class_name[]" value="{{ $content->name }}">
                                                                    <input type="hidden" name="id[]" value="{{ $content->id }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="form-group">
                                                                    <label class="font-weight-700 font-size-16">Title <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="title[]" value="{{ $content->title }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="form-group">
                                                                    <label class="font-weight-700 font-size-16">Short Description <span class="text-danger">*</span></label>
                                                                    <textarea rows="3" name="information[]" class="form-control">{{ $content->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-sm-2 text-center">
                                                                <button type="button" class="btn btn-danger btn-sm delete-content" data-id="{{ $content->id }}"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary btn-sm add-inner-image"><i class="fa fa-plus-square"></i> Add More Content</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('/') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <template id="image-template">
        <div class="image-inner-list">
            <div class="row">
                <div class="col-md-11">
                    <div class="form-group">
                        <label class="font-weight-700 font-size-16">Icon Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="class_name[]">
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="form-group">
                        <label class="font-weight-700 font-size-16">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title[]">
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="form-group">
                        <label class="font-weight-700 font-size-16">Description <span class="text-danger">*</span></label>
                        <textarea rows="3" name="information[]" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-1 col-sm-2 text-center removed-section">
                    <button type="button" class="btn btn-danger btn-sm inner-btn-remove"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </template>
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
            $('#description').summernote();
            $('#category_id').select2();

            //Append information
            $('body').on('click', '.add-inner-image', function() {
                var html2 = $('#image-template').html();
                var item2 = $(html2);
                $(this).closest('.image-upload-item').find('.image-inner-container').append(item2);
                $(this).closest('.image-upload-item').find('.image-inner-container');

            });
            $('body').on('click', '.inner-btn-remove', function () {
                $(this).closest('.image-inner-list').remove();
            });

            $('#btn-add-color').click(function () {
                var html = $('#color-template').html();
                var item = $(html);

                $('#image-uploads-container').append(item);
                // $('.features').summernote();
                //initProduct();

                if ($('.image-upload-item').length >= 1 ) {
                    $('.btn-remove').show();
                }
            });

            $('body').on('click', '.btn-remove', function () {
                $(this).closest('.image-upload-item').remove();

                if ($('.image-upload-item').length <= 1 ) {
                    $('.btn-remove').hide();
                }
            });

            if ($('.image-upload-item').length <= 1 ) {
                $('.btn-remove').hide();
            } else {
                $('.btn-remove').show();
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.cover_img').dropify();
            $('.image').dropify();
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-content').forEach(function (button) {
                button.addEventListener('click', function () {
                    const contentId = this.getAttribute('data-id');
                    const contentBlock = this.closest('.content-block');

                    if (confirm('Are you sure you want to delete this content?')) {
                        fetch(`/contents/${contentId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                contentBlock.remove();
                                alert('Content deleted successfully.');
                            } else {
                                alert('Failed to delete content.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                    }
                });
            });
        });
    </script>
@endsection
