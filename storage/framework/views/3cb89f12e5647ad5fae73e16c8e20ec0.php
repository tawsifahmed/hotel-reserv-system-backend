<?php if(count($result) > 0): ?>
<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('user.approval.show',base64_encode($notify->id))); ?>" class="text-reset notification-item">
    <div class="d-flex">
        <img src="<?php echo e(asset($notify->createdby->thumbnail)); ?>"
        class="me-3 rounded-circle avatar-xs" alt="user-pic">
        <div class="flex-1">
            <h6 class="mb-1"><?php echo e($notify->createdby->name); ?></h6>
            <div class="font-size-12 text-muted">
                <p class="mb-1"><?php echo e($notify->message); ?></p>
                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <?php echo e(\App\Models\User::getTimeAgo(strtotime($notify->notify_datetime))); ?></p>
            </div>
        </div>
    </div>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p class="text-center"> No Notification!</p>
<?php endif; ?>
<?php /**PATH E:\Projects\club-management-system\resources\views/administrative/layouts/notification.blade.php ENDPATH**/ ?>