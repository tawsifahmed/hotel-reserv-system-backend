<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Instance List</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_instance')): ?>
                        <a href="<?php echo e(route('administrative.instance.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-add-line"></i>
                            Add New
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Location</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_instance', 'update_instance', 'delete_instance'])): ?>
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
            var tables = $('.datatable').DataTable({
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
                ajax: "<?php echo e(route('administrative.instance.data')); ?>",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
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
                        data: 'location',
                        name: 'location'
                    },
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_instance', 'update_instance', 'delete_instance'])): ?>
                        {
                            data: 'action',
                            name: 'action'
                        },
                    <?php endif; ?>
                ]
            });
        });

        function deleteData(rowid) {
            let url = '<?php echo e(route('administrative.instance.destroy', ':id')); ?>';
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
                            $('.datatable').DataTable().ajax.reload(null, false);
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

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/instance/index.blade.php ENDPATH**/ ?>