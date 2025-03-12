<?php $__env->startSection('page-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Permission</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_create')): ?>
                        <a href="<?php echo e(route('administrative.permission.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
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
                        <th class="disabled-sorting text-left">Action</th>
                        <!-- <th class="disabled-sorting text-left" style="width: 100px">delete</th> -->
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
                ajax: "<?php echo e(route('administrative.permission.data')); ?>",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action'},
                ]
            });
        });

        function deleteData(rowid) {
            let url = '<?php echo e(route("administrative.permission.destroy", ":id")); ?>';
            url = url.replace(':id', rowid);
            Swal.fire({
                title: 'Do you want to delete this?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    axios.delete(url).then(res => {
                        if(res.data == 'success'){
                            Swal.fire('Saved!', '', 'success')
                            $('#datatables').DataTable().ajax.reload( null, false );
                        }
                    });
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/permission/index.blade.php ENDPATH**/ ?>