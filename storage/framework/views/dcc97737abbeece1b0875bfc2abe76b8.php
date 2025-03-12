<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <?php $__currentLoopData = request()->segments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(rtrim(request()->route()->getPrefix(), '/') != $segment && ! preg_match('/[0-9]/', $segment)): ?>
                            <?php if(!$loop->first): ?>
                                <li class="breadcrumb-item <?php echo e($loop->last ? 'active' : ''); ?>" <?php echo e($loop->last ? 'aria-current="page"' : ''); ?>>
                                    <?php if($loop->last): ?>
                                        <?php echo e(ucfirst($segment)); ?>

                                    <?php else: ?>
                                        <?php echo e(ucfirst($segment)); ?>

                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>

        </div>
    </div>
</div>

<?php /**PATH E:\Projects\club-management-system\resources\views/administrative/layouts/partial/_breadcrump.blade.php ENDPATH**/ ?>