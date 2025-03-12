<?php $__env->startSection('page-css'); ?>
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
                                    <form class="" action="<?php echo e(route('user.reset-email-check')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="auth-form-group-custom mb-4">
                                            <i class="ri-mail-line auti-custom-input-icon"></i>
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                        </div>

                                        <div class="mt-4 text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/recover-password.blade.php ENDPATH**/ ?>