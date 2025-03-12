<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Product List</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_create')): ?>
                        <a href="<?php echo e(route('administrative.product.create')); ?>" class="btn btn-primary btn-sm">
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('product_edit','product_delete')): ?>
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
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/product/index.blade.php ENDPATH**/ ?>