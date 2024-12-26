@extends('backend.layouts.app')
@section('title', 'Add Category')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Create</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('category') }}">Category</a></li>
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
                        <h4 class="box-title">Category Information</h4>
                    </div>
                    <div class="box-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('category.add') }}">
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
                                            <label class="font-weight-700 font-size-16">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter category name" value="{{ old('name') }}">
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Short Description <span class="text-danger">*</span></label>
                                            <textarea rows="3" name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-700 font-size-16">Type <span class="text-danger">*</span></label>
                                            <select id="type_id" name="type_id" class="form-control type_id">
                                                <option value="">Select type</option>
                                                <option value="1">Blog</option>
                                                <option value="2">Service</option>
                                            </select>
                                            @error('type_id')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
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

                            <div class="form-actions mt-10">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('category') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
    </style>
@endsection

@section('script')
@endsection
