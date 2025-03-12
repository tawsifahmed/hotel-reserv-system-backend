<?php $__env->startSection('content'); ?>
<div class="row g-0">
    <div class="col-lg-4">
        <div class="authentication-page-content bg-white p-4 d-flex align-items-center min-vh-100">
            <div class="w-100">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div>
                            <div class="text-center">
                                <div>
                                    <a href="<?php echo e(route('login')); ?>" class="">
                                        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="180" class="auth-logo logo-dark mx-auto">
                                    </a>
                                </div>
                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                <p class="text-muted">Sign in to Club Management.</p>
                            </div>
                            <?php if($errors->any()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first()); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <div class="mt-3">
                                <form class="" method="post"  action="<?php echo e(route('login.post')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3 auth-form-group-custom mb-4">
                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3 auth-form-group-custom mb-4">
                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                        <label class="form-check-label" for="customControlInline">Remember me</label>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        
                                    </div>
                                </form>
                            </div>

                            <div class="mt-5 text-center">
                                <p>© <script>document.write(new Date().getFullYear())</script> Club Management </p>
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

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/login.blade.php ENDPATH**/ ?>