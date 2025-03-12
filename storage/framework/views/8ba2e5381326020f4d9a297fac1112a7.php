<?php $__env->startSection('page-css'); ?>
    <style>
        .tox-notifications-container {
            display: none;
        }
        .input-group-text{
            min-width: 130px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Product Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_list')): ?>
                        <a href="<?php echo e(route('administrative.product')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Product List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <div class="button-items mb-3">
                    <a class="btn btn-light  waves-effect waves-light">
                        Basic Information <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a  class="btn btn-light waves-effect waves-light">
                        Classification <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-success waves-effect waves-light">
                        Feature <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-light waves-effect waves-light">
                        Image <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                </div>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.product.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" name="type" value="feature">
                    <input type="hidden" class="form-control" name="product_id" value="<?php echo e($id); ?>">
                    <div class="form-group mb-3">
                        <label for="feature">Other Feature </label>
                        <textarea id="elm1" class="editor" name="feature"><?php echo e(old('feature')); ?></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('administrative.product')); ?>" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script src="<?php echo e(asset('assets/libs/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/form-editor.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/product/feature.blade.php ENDPATH**/ ?>