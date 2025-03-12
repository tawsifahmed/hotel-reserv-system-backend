<?php $__env->startSection('page-css'); ?>
<style>
/* password field */
.toggle-password{
    position: absolute;
    top: 17px;
    right: 17px;
    font-size: 24px;
    color: #00407085;
}
.toggle-password-one{
    position: absolute;
    top: 17px;
    right: 17px;
    font-size: 24px;
    color: #00407085;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row g-0">
        <div class="col-lg-4">
            <div class="authentication-page-content  bg-white p-4 d-flex align-items-center min-vh-100">
                <div class="w-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div>
                                <div class="text-center">
                                    <div>
                                        <a href="<?php echo e(route('user.login')); ?>" class="">
                                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="180" class="auth-logo logo-dark mx-auto">
                                        </a>
                                    </div>

                                    <h4 class="font-size-18 mt-4">Reset Password</h4>
                                    <p class="text-muted">Reset your password to Club JCI.</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <?php if($errors->any()): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo e($errors->first()); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php endif; ?>
                                    <form class="" action="<?php echo e(route('user.reset-password')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="uid" value="<?php echo e($user_id); ?>">
                                        <div class="mb-3 auth-form-group-custom mb-4">
                                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                            <label for="new_password">New Password</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New password" value="<?php echo e(old('new_password')); ?>">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="mb-3 auth-form-group-custom mb-4">
                                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" value="<?php echo e(old('password_confirmation')); ?>">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password-one"></span>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="mt-4 text-center">
                                    <p>Don't have an account ? <a href="<?php echo e(route('user.login')); ?>" class="fw-medium text-primary"> Log in </a> </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="authentication-bg">
                <div class="bg-overlay"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<script>
$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $('#new_password');
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});
$(".toggle-password-one").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $('#password_confirmation');
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/reset-password.blade.php ENDPATH**/ ?>