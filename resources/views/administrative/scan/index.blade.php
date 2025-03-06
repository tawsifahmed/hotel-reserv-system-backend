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
                <a href="{{ route('administrative.scan.list') }}">Scan List</a>
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
                <h4 class="mb-3 mb-md-0"> Scan List</h4>
            </div>
            @can('create_scan_qr')
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <a href="{{ route('administrative.scan.create') }}"
                        class="btn btn-xs btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="fas fa-plus-square" data-feather="plus-square"></i>
                        Scan Now
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
                                            <th>Instance name</th>
                                            <th>Guest name</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Location</th>
                                            <th>Scan Date</th>
                                            @canany(['read_scan_qr', 'delete_scan_qr'])
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
                ajax: "{{ route('administrative.scan.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'instance_name',
                        name: 'instance_name'
                    },
                    {
                        data: 'guest_name',
                        name: 'guest_name'
                    },

                    {
                        data: 'start_date_time',
                        name: 'start_date_time'
                    },
                    {
                        data: 'end_date_time',
                        name: 'end_date_time'
                    },
                    {
                        data: 'instance_location',
                        name: 'instance_location'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    @canany(['read_scan_qr', 'delete_scan_qr'])
                        {
                            data: 'action',
                            name: 'action'
                        },
                    @endcanany
                ]
            });
        });

        function deleteData(rowid) {
            let url = '{{ route('administrative.scan.destroy', ':id') }}';
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
