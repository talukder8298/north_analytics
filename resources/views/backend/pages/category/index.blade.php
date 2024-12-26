@extends('backend.layouts.app')
@section('title', 'Category List')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <h4 class="box-title">Category Information</h4>
                                </div>
                            </div><!--end col-->
                            <div class="col-auto text-end">
                                <a href="{{ route('category.add') }}" class="btn btn-sm btn-light bg-info">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="customDataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sort</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->sort }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->type_id == 1)
                                                <span class="label label-primary">Blog</span>
                                            @else
                                                <span class="label label-warning">Service</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($category->status == 1)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('category.edit', ['category' => $category->id]) }}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .modal-danger .modal-header *, .modal-warning .modal-header * {
            color: #444141;
        }
        .theme-primary .modal-danger .modal-body {
            background-color: #ffffff !important;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#customDataTable').DataTable();
        });
    </script>
    <script>
        $(function () {
            $('#table').DataTable({
                "order": [[ 3, "asc" ]]
            });
        })
    </script>
@endsection
