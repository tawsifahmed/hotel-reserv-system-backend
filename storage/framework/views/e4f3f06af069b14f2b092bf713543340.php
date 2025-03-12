<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Details</h4>
                    <a href="<?php echo e(route('administrative.approval.list')); ?>" class="btn btn-primary btn-sm">
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

                        <?php if(!$notify->createdby->admin_approved == 1 && !$notify->createdby->admin_approved ==  2): ?>
                            <hr>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approval_status_approve')): ?>
                            <a class="btn btn-success btn-sm" href="<?php echo e(route('administrative.approval.status',['id'=>$notify->id,'status'=>1])); ?>" >
                                <i class="ri-check-line"></i> Approve </a>&nbsp;&nbsp;
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approval_status_decline')): ?>
                            <a class="btn btn-danger btn-sm" href="<?php echo e(route('administrative.approval.status',['id'=>$notify->id,'status'=>2])); ?>" >
                                <i class=" ri-close-fill"></i> Decline </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>



            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Profile Details</h4>
                    <a href="<?php echo e(route('administrative.member.profile-download',$notify->createdby)); ?>"  class="btn btn-sm btn-danger">
                        <strong><i class="ri-download-cloud-2-line"></i> PDF</strong>
                    </a>
                </div>
                <div class="mb-3" style="overflow:auto;">
                    <?php echo $__env->make('administrative.aprove-list.pdf.profile-pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/aprove-list/show.blade.php ENDPATH**/ ?>