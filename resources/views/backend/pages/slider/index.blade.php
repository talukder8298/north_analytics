@extends('backend.layouts.app')
@section('title',     'Slider List')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <h4 class="box-title">Slider Information</h4>
                                </div>
                            </div><!--end col-->
                            <div class="col-auto text-end">
                                <a href="{{ route('slider.add') }}" class="btn btn-sm btn-light bg-info">
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
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Sort</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $slider)
                                    <tr>
                                        <td><img src="{{ asset('pictures/sliders/'.$slider->image) }}" alt="image" height="50px"></td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->sub_title }}</td>
                                        <td>{{ $slider->sort }}</td>
                                        <td>
                                            @if ($slider->status == 1)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('slider.edit', ['slider' => $slider->id]) }}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm btnDelete" data-id="{{ $slider->id }}"><i class="fa fa-trash-o"></i> Delete</button>
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
