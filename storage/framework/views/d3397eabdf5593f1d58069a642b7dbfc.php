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
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row g-0">
    <div class="col-lg-4">
        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
            <div class="w-100">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div>
                            <div class="text-center">
                                <div>
                                    <a href="<?php echo e(url('/')); ?>" class="">
                                        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" width="150" class="auth-logo logo-dark mx-auto">
                                    </a>
                                </div>
                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                <p class="text-muted">Sign in to Auto Technic.</p>
                            </div>
                            <?php if($errors->any()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first()); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <div class="mt-3">
                                <form id="login" method="post" action="<?php echo e(route('admin.login')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3 auth-form-group-custom mb-4">
                                        <i class="ri-mail-line auti-custom-input-icon"></i>
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter email address">
                                    </div>
                                    <div class="mb-3 auth-form-group-custom mb-4">
                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <button id="click-submit" class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                    
                                </form>
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
        var input = $('#password');
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/login.blade.php ENDPATH**/ ?>