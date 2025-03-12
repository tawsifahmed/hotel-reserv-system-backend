<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Model List</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('model_create')): ?>
                        <a href="<?php echo e(route('administrative.model.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-add-line"></i>
                            Add New
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Charger Info</th>
                            <th width="30%">Details</th>
                            <th>Status</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('model_edit','model_delete')): ?>
                            <th class="disabled-sorting text-left">Action</th>
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
            $(function() {
                var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "<?php echo e(route('administrative.model.data')); ?>",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        { data: null, name: 'brand_image',
                            render: function(data, type, full, meta) {
                                return "<img src='" + full.brand_image + "' height='25' style='margin-right:10px;float:left'/>" + full.brand;
                            }
                        },
                        { data: null, name: 'image',
                            render: function(data, type, full, meta) {
                                return "<img src='" + full.image + "' height='25' style='margin-right:10px;float:left'/>";
                            }
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        { data: null, name: 'charger_type',
                            render: function(data, type, full, meta) {
                                return "<img src='" + full.charger_type_image + "' height='25' style='margin-right:10px;float:left'/>" + full.charger_type;
                            }
                        },
                        {
                            data: 'details',
                            name: 'details'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('model_edit','model_delete')): ?>
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                        <?php endif; ?>
                    ],
                });
            });
        });

        function deleteData(rowid) {
            let url = '<?php echo e(route('administrative.model.delete', ':id')); ?>';
            url = url.replace(':id', rowid);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
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
                            });
                            $('#datatable').DataTable().ajax.reload(null, false);
                        }
                    });
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\b-charging\resources\views/administrative/model/index.blade.php ENDPATH**/ ?>