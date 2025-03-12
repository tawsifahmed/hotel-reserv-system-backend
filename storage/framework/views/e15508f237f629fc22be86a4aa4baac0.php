<?php $__env->startSection('page-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- end page title -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-4">Information</h4>
                <div>
                    <a href="<?php echo e(route('administrative.member.profile-download',$profile->user_id)); ?>"  class="btn btn-sm btn-danger">
                        <strong><i class="ri-download-cloud-2-line"></i> PDF</strong>
                    </a>
                </div>
            </div>
            <div class="mb-3" style="overflow:auto;">
                <?php echo $__env->make('administrative.aprove-list.pdf.profile-pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/member/profile.blade.php ENDPATH**/ ?>