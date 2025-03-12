<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">User</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-4">Information</h4>
                <div>
                    <a href="<?php echo e(route('user.profile.download')); ?>"  class="btn btn-sm btn-danger">
                        <strong><i class="ri-download-cloud-2-line"></i> PDF</strong>
                    </a>&nbsp;
                    <a href="<?php echo e(route('user.profile')); ?>" class="btn btn-sm btn-primary">
                        <strong><i class="ri-pencil-fill"></i> Edit</strong>
                    </a>
                </div>
            </div>
            <div class="mb-3" style="overflow:auto;">
                <?php if(Auth::user()->admin_approved == 1): ?>
                    <div class="alert alert-success text-center mb-3" style="max-width: 191mm;margin:auto"> Profile Approved</div>
                <?php endif; ?>
                <?php if(Auth::user()->admin_approved == 2): ?>
                    <div class="alert alert-danger text-center mb-3" style="max-width: 191mm;margin:auto"> Profile Declined</div>
                <?php endif; ?>
                <?php if(Auth::user()->admin_approved == 0): ?>
                    <div class="alert alert-warning text-center mb-3" style="max-width: 191mm;margin:auto"> Profile Approval Pending</div>
                <?php endif; ?>
                <?php echo $__env->make('frontend.profile.pdf.profile-pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/view.blade.php ENDPATH**/ ?>