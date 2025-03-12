<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Approval Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">User</a></li>
                    <li class="breadcrumb-item active">Approval</li>
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
                <h4 class="card-title">Details</h4>
                <a href="<?php echo e(route('user.approval.list')); ?>" class="btn btn-primary btn-sm">
                    <i class="ri-list-check"></i>
                    Approval List
                </a>
            </div>
            <div class="row pt-3">
                <div class="col-md-3">
                   <img class="details-thumbnail" src="<?php echo e(asset($notify->createdby->thumbnail)); ?>" alt="<?php echo e($notify->createdby->name); ?>">
                </div>
                <div class="col-md-9">
                    <h3><?php echo e($notify->createdby->name); ?></h3>
                    <h5><?php echo e($notify->createdby->email); ?></h5>
                    <hr>
                    <p class="mb-0"><strong>Message:</strong></p>
                    <p  class="mb-0"><?php echo e($notify->message); ?></p>
                    <hr>
                    <p class="mb-0"><strong>Notify Date:</strong></p>
                    <p  class="mb-0"><?php echo e(date('Y-M-d',strtotime($notify->notify_datetime))); ?></p>
                    <hr>
                    <?php if($notify->createdby): ?>
                        Proposed by:
                        <?php if($notify->createdby->proposed_by_approved == 1): ?>
                           <span class="badge bg-success"><i class="ri-check-fill"></i>Approved</span>
                        <?php elseif($notify->createdby->proposed_by_approved == 2): ?>
                            <span class="badge bg-danger"><i class="ri-close-fill"></i>Decline</span>
                        <?php else: ?>
                            <span class="badge bg-warning"><i class="ri-bubble-chart-line"></i>Pending</span>
                        <?php endif; ?>
                        <br>
                        Approve Date: <?php echo e(date('Y-M-d',strtotime($notify->createdby->proposed_by_approved_date))); ?>

                        <hr>
                        Second by:
                        <?php if($notify->createdby->second_by_approved == 1): ?>
                            <span class="badge bg-success"><i class="ri-check-fill"></i>Approved</span>
                        <?php elseif($notify->createdby->second_by_approved == 2): ?>
                            <span class="badge bg-danger"><i class="ri-close-fill"></i>Decline</span>
                        <?php else: ?>
                            <span class="badge bg-warning"><i class="ri-bubble-chart-line"></i>Pending</span>
                        <?php endif; ?>
                        <br>
                        Approve Date: <?php echo e($notify->createdby->second_by_approved_date?date('Y-M-d',strtotime($notify->createdby->second_by_approved_date)):''); ?>

                        <hr>
                        Admin:
                        <?php if($notify->createdby->admin_approved == 1): ?>
                            <span class="badge bg-success"><i class="ri-check-fill"></i>Approved</span>
                        <?php elseif($notify->createdby->admin_approved == 2): ?>
                            <span class="badge bg-danger"><i class="ri-close-fill"></i>Decline</span>
                        <?php else: ?>
                            <span class="badge bg-warning"><i class="ri-bubble-chart-line"></i>Pending</span>
                        <?php endif; ?>
                        <br>
                        Approve Date: <?php echo e($notify->createdby->admin_approved_date?date('Y-M-d',strtotime($notify->createdby->admin_approved_date)):''); ?>


                    <?php endif; ?>
                    <hr>
                    <a class="btn btn-success btn-sm" href="<?php echo e(route('user.approval.status',['id'=>$notify->id,'status'=>1])); ?>" >
                        <i class="ri-check-line"></i> Approve </a>&nbsp;&nbsp;
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('user.approval.status',['id'=>$notify->id,'status'=>2])); ?>" >
                        <i class=" ri-close-fill"></i> Decline </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Projects\club-management-system\resources\views/frontend/approval/show.blade.php ENDPATH**/ ?>