<style>
    label {
        margin-bottom: 3px !important;
        font-size: 10px;
        margin-top: 6px;
    }
</style>

<?php $__env->startSection('content'); ?>
<div class="row g-0">
    <div class="col-lg-4">
        <div  class="authentication-page-content bg-white p-4 d-flex align-items-center min-vh-100">
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
                                <h4 class="font-size-14 mb-0">Create an Appointment</h4>
                            </div>
                            <?php if($errors->any()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first()); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <div class="mt-3 text-center">
                                <?php if($appointment->status == 0): ?>
                                <h5 class="card-title text-primary mb-3">Approve / Decline <strong>"<?php echo e($appointment->name); ?>"</strong> Appointment</h5>
                                <div class="layout-button mt-25 d-flex justify-content-center">
                                    <a href="<?php echo e(route('appointment.status-update',[1,$appointment->code])); ?>" class="btn btn-primary button-submit px-20">
                                        Approve
                                    </a>&nbsp;&nbsp;
                                    <a href="<?php echo e(route('appointment.status-update',[2,$appointment->code])); ?>" class="btn btn-danger button-submit px-20">
                                        Decline
                                    </a>
                                </div>
                                <?php elseif($appointment->status == 1): ?>
                                    <div class="text-center">
                                        <img src="<?php echo e(asset('frontend/images/success.png')); ?>" height="100px" class="mb-3">
                                        <h5 class="card-title text-primary">Appointment Approved</h5>
                                    </div>
                                <?php elseif($appointment->status == 2): ?>
                                    <div class="text-center">
                                        <img src="<?php echo e(asset('frontend/images/decline.png')); ?>" height="100px" class="mb-3">
                                        <h5 class="card-title text-primary">Appointment Declined</h5>
                                    </div>
                                <?php else: ?>

                                <?php endif; ?>
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/appointment-status.blade.php ENDPATH**/ ?>