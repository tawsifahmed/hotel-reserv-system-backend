<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">User Edit</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_list')): ?>
                        <a href="<?php echo e(route('administrative.user')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            User List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.user.update', $data->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>

                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="name">Code *</label>
                        <input required type="text" class="form-control form-control-danger" id="code" name="code" autocomplete="off" placeholder="User Code" value="<?php echo e(old('code', isset($data) ? $data->code : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('code')): ?>
                        <small id="name-error" class="error mt-2 text-danger" for="code"><?php echo e($errors->first('code')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="name">Full Name *</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Full Name" value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('name')): ?>
                        <small id="name-error" class="error mt-2 text-danger" for="name"><?php echo e($errors->first('name')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email *</label>
                        <input required type="email" class="form-control form-control-danger" id="email" name="email" autocomplete="off" placeholder="Email" value="<?php echo e(old('email', isset($data) ? $data->email : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('email')): ?>
                        <small id="email-error" class="error mt-2 text-danger" for="email"><?php echo e($errors->first('email')); ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-danger" id="password" name="password" autocomplete="off" value="" aria-invalid="true" placeholder="Password">
                        <?php if($errors->has('password')): ?>
                        <small id="password-error" class="error mt-2 text-danger" for="password"><?php echo e($errors->first('password')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone Number *</label>
                        <input required type="text" class="form-control form-control-danger" id="phone" name="phone" autocomplete="off" placeholder="Phone Number" value="<?php echo e(old('phone', isset($data) ? $data->phone : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('phone')): ?>
                        <small id="phone-error" class="error mt-2 text-danger" for="phone"><?php echo e($errors->first('phone')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="roles">Selected Role *</label>
                        <select name="role" id="roles" class="form-control" required>
                            <option selected disabled value ="">Select Role</option>
                            <?php if(count($roles)>0): ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php echo e(isset($data->roles) && $data->roles->first()->id == $id ? 'selected' : ''); ?>>
                                    <?php echo e($role); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <?php if($errors->has('roles')): ?>
                        <small id="name-error" class="error mt-2 text-danger" for="name"><?php echo e($errors->first('roles')); ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="ustatus"> Status *</label>
                        <select id="ustatus" name="status" class="form-control ">
                            <option value="1" <?php echo e($data->status == 1 ?  'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo e($data->status != 1 ?  'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo e(route('administrative.user')); ?>" class="ml-3 btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/user/edit.blade.php ENDPATH**/ ?>