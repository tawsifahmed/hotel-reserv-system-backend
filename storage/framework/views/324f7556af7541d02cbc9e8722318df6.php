<?php $__env->startSection('page-css'); ?>
    <style>
        .tox-notifications-container {
            display: none;
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
                    <h4 class="card-title">Restaurant settings Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurant_settings_list')): ?>
                        <a href="<?php echo e(route('administrative.restaurant-settings')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Settings List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.restaurant-settings.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name">Restaurant Prefix *</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="title" autocomplete="off" placeholder="Restaurant Prefix" value="<?php echo e(old('title', isset($data) ? $data->title : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('title')): ?>
                        <small id="title-error" class="error mt-2 text-danger" for="title">Please enter Restaurant Prefix</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="commission">Commission Percentage *</label>
                        <div class="input-group mb-3">
                            <input required type="number" step="0.01" class="form-control form-control-danger" id="commission" name="commission" autocomplete="off" placeholder="Commission Percentage" value="<?php echo e(old('commission', isset($data) ? $data->commission : '')); ?>" aria-invalid="true">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">%</span>
                            </div>
                            <?php if($errors->has('commission')): ?>
                            <small id="commission-error" class="error mt-2 text-danger" for="commission">Please enter Commission Percentage</small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Status *</label>
                        <select id="ustatus" name="status" class="form-select" required>
                            <option value="1" selected>Active</option>
                            <option value="0" >Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="<?php echo e(route('administrative.restaurant-settings')); ?>" class="btn btn-light">Cancel</a>

                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/restaurant-settings/create.blade.php ENDPATH**/ ?>