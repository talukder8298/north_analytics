@extends('backend.layouts.app')
@section('title', 'Service List')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <h4 class="box-title">Service Information</h4>
                                </div>
                            </div><!--end col-->
                            <div class="col-auto text-end">
                                <a href="{{ route('service.add') }}" class="btn btn-sm btn-light bg-info">
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
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->sort }}</td>
                                        <td>{{ \Illuminate\Support\Str::words($service->name, 10, '...') }}</td>
                                        <td>
                                            <img height="100px" src="{{ asset('pictures/service/'. $service->image) }}" alt="{{ $service->name }}">
                                        </td>
                                        <td>{{ $service->category->name ?? '' }}</td>
                                        <td>
                                            <a href="{{ $service->link }}" target="_blank">{{ $service->link }}</a>
                                        </td>
                                        <td>
                                            @if ($service->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('service.edit',['service'=> $service->id])}}" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                                            <a role="button" data-id="{{ $service->id }}" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a>
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

    <div class="modal modal-danger fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-dark">Delete Slider</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline" id="modalBtnDelete">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
