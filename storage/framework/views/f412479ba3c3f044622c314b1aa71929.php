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
                    <h4 class="card-title">Type of Membership Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('type_of_membership_list')): ?>
                        <a href="<?php echo e(route('administrative.type-of-membership')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Type List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.type-of-membership.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name">Type Name *</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="title" autocomplete="off" placeholder="Type Name" value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('title')): ?>
                        <small id="title-error" class="error mt-2 text-danger" for="title">Please enter a name</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Membership Price</label>
                        <input type="number" class="form-control form-control-danger" id="membership_price" name="membership_price" autocomplete="off" placeholder="Membership price" value="<?php echo e(old('membership_price', isset($data) ? $data->membership_price : '')); ?>" aria-invalid="true">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Invoice generate date</label>
                        <select id="" name="invoice_generate_date" class="form-select select2" >
                            <option value="" selected>Select invoice generate date</option>
                            <?php
                                for($i = 1; $i<=31; $i++) {
                            ?>
                              <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Status *</label>
                        <select id="ustatus" name="status" class="form-select" required>
                            <option value="1" selected>Active</option>
                            <option value="0" >Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="<?php echo e(route('administrative.type-of-membership')); ?>" class="btn btn-light">Cancel</a>

                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/type-of-membership/create.blade.php ENDPATH**/ ?>