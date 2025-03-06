@extends('administrative.layouts.master')
@section('page-css')
@endsection
@section('content')
    <div class="mt-2">
        <ul class="dm-breadcrumb nav">
            <li class="dm-breadcrumb__item">
                <a href="#">
                    Home
                </a>
                <span class="slash">/</span>
            </li>
            <li class="dm-breadcrumb__item">
                <a href="{{ route('administrative.category.user') }}">Category</a>
                <span class="slash"></span>
            </li>
            <li class="dm-breadcrumb__item">
                <span></span>
            </li>
        </ul>
    </div>
    <div class="message-wrapper"></div>
    <div class="mt-4"></div>

    <div class="pt-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-2 ">
            <div>
                <h4 class="mb-3 mb-md-0">Guest</h4>
            </div>
            @can('create_guest')
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <a href="{{ route('administrative.guest.user.create') }}"
                        class="btn btn-xs btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="fas fa-plus-square" data-feather="plus-square"></i>
                        Add New
                    </a>
                    <a href="#" class="btn btn-xs ml-2 btn-info btn-icon-text mb-2 mb-md-0 import">
                        <i class="fas fa-file-import" data-feather="plus-square"></i>
                        Import XLS
                    </a>
                </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card mb-30">
                <div class="card">
                    <div class="card-body ">
                        <h6 class="card-title"> </h6>
                        <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless" id="datatables">
                                    <thead>
                                        <tr class="table-header">
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Organization</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Guest Type</th>
                                            <th>Scan Limite</th>
                                            @canany(['read_guest', 'update_guest', 'delete_guest'])
                                                <th class="disabled-sorting text-left">Actions</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- import modal start -->
    <div class="modal fade bs-example-modal-md modal-import" tabindex="-1" role="dialog"
        aria-labelledby="courseLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="POST" class="form-horizontal" enctype="multipart/form-data" id="import_form"
                    action="javascript:void(0)">
                    <div class="modal-header">
                        <h6 class="modal-title">Import Excel</h6>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div>
                                                <a href="{{ asset('import-file/sample.xlsx') }}" download
                                                    class="text-primary"><i class="fas fa-download mr-2"></i>
                                                    Download Sample Excel</a>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="file" class="col-sm-3 control-label mb-2">Excel File<span
                                                        class="text-danger"> * </span></label>
                                                <div class="col-sm-12">
                                                    <input type="file" id="file" name="file"
                                                        class="form-control" />
                                                    <span id="file_error" class="font-12 text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span id="edit_common_error" class="font-12 text-danger"></span>
                        <button type="submit" class="btn btn-primary btn-sm btn-submit">Upload</button>
                        <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- import modal end -->
@endsection
@section('page-js')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('administrative.guest.user.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'organisation',
                        name: 'organisation'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'instance_id',
                        name: 'instance_id'
                    },
                    {
                        data: 'scan_limitation',
                        name: 'scan_limitation'
                    },
                    @canany(['read_guest', 'update_guest', 'delete_guest'])
                        {
                            data: 'action',
                            name: 'action'
                        },
                    @endcanany
                ]
            });
        });

        $('.import').click(function(e) {
            $(this).addClass('btn-loading');
            $('.modal-import').modal('show');
        });
        $('#import_form').submit(function(e) {
            e.preventDefault();
            $('.btn-submit').addClass('btn-loading');
            $('#file_error').html('');
            var form = $('#import_form');
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('administrative.guest.user.import') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.success) {
                        $('.modal-import').modal('hide');
                        swal.fire({
                            icon: "success",
                            button: false,
                            timer: 1000,
                            text: data.success,
                        });
                        $('.btn-submit').removeClass('btn-loading');
                        $('#datatables').DataTable().ajax.reload(null, false);
                        return false;
                    } else {
                        $('.btn-submit').removeClass('btn-loading');
                        $('#file_error').html(data.error.file);
                    }
                },
                error: function(data) {
                    $('.btn-submit').removeClass('btn-loading');
                }
            });
        });

        $('.modal-import').on('shown.bs.modal', function(e) {
            $('#file').val('');
            $('.import').removeClass('btn-loading');
        });



        function deleteData(rowid) {
            let url = '{{ route('administrative.guest.user.destroy', ':id') }}';
            url = url.replace(':id', rowid);
            swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover your data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(url).then(res => {
                        if (res.data == 'success') {
                            swal.fire({
                                icon: "success",
                                button: false,
                                timer: 1000,
                                text: 'Successfully deleted',
                            });
                            $('#datatables').DataTable().ajax.reload(null, false);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swal.fire({
                        icon: 'error',
                        button: false,
                        text: 'Your data is safe!',
                        timer: 1000,
                    });
                }
            });
        }
    </script>
@endsection
