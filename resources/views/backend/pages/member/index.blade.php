@extends('backend.layouts.app')
@section('title', 'Member List')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <h4 class="box-title">Member Information</h4>
                                </div>
                            </div><!--end col-->
                            <div class="col-auto text-end">
                                <a href="{{ route('member.create') }}" class="btn btn-sm btn-light bg-info">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Member
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="customDataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Short Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->sort }}</td>
                                        <td>{{ \Illuminate\Support\Str::words($member->name, 6, '...') }}</td>
                                        <td>
                                            <img height="100px" src="{{ asset($member->image ? 'pictures/member/'. $member->image : 'pictures/client/client_logo/no_image.jpg') }}" alt="{{ $member->name }}">
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::words($member->short_description, 7, '...') }}</td>
                                        <td>
                                            @if ($member->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('member.edit',['member'=> $member->id])}}" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                                            <a role="button" data-id="{{ $member->id }}" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
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
            var selectedId;

            $('#table').DataTable({
                "order": [[ 3, "asc" ]]
            });

            $('.btnDelete').click(function () {
                $('#modal-delete').modal('show');
                selectedId = $(this).data('id');
            });

            $('#modalBtnDelete').click(function () {
                $.ajax({
                    method: "POST",
                    url: "{{ route('slider.delete') }}",
                    data: { id: selectedId }
                }).done(function( msg ) {
                    location.reload();
                });
            });
        })
    </script>
@endsection
