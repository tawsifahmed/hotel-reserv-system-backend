<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Scan List</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_scan_qr')): ?>
                        <a href="<?php echo e(route('administrative.scan.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-add-line"></i>
                            Scan Now
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr class="table-header">
                            <th>SL</th>
                            <th>Instance name</th>
                            <th>Guest name</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Location</th>
                            <th>Scan Date</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_scan_qr', 'delete_scan_qr'])): ?>
                                <th class="disabled-sorting text-left">Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
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
                ajax: "<?php echo e(route('administrative.scan.data')); ?>",
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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_scan_qr', 'delete_scan_qr'])): ?>
                        {
                            data: 'action',
                            name: 'action'
                        },
                    <?php endif; ?>
                ]
            });
        });

        function deleteData(rowid) {
            let url = '<?php echo e(route('administrative.scan.destroy', ':id')); ?>';
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/scan/index.blade.php ENDPATH**/ ?>