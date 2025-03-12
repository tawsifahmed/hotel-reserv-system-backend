<?php $__env->startSection('page-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Roles</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                        <a href="<?php echo e(route('administrative.role.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-add-line"></i>
                            Add New
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th> SL</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
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
                search: "Search"
            },
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('administrative.role.data')); ?>",
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
                    data: 'permission',
                    name: 'permission'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });
    });

    function deleteData(rowid) {
        let url = '<?php echo e(route("administrative.role.destroy", ":id")); ?>';
        url = url.replace(':id', rowid);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#1cbb8c",
            cancelButtonColor: "#ff3d60",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                axios.delete(url).then(res => {
                    if (res.data == 'success') {
                        Swal.fire({
                            title: "Good job!",
                            text: "Delete Successfully.",
                            icon: "success",
                            timer: 2000,
                        })
                        $('#datatable').DataTable().ajax.reload(null, false);
                    }
                });
            }
        })
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/role/index.blade.php ENDPATH**/ ?>