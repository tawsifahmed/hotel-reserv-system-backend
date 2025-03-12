<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Show Instance</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_instance')): ?>
                        <a href="<?php echo e(route('administrative.instance')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                             Instance List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="forms-sample" action="#"
                method="POST" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>

                <?php echo csrf_field(); ?>

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input readonly type="text" class="form-control form-control-danger" id="name"
                        name="name" autocomplete="off" placeholder="Name"
                        value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                    <?php if($errors->has('name')): ?>
                        <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                            name</label>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input readonly type="text" class="form-control form-control-danger" id="description"
                        name="description" autocomplete="off" placeholder="Description"
                        value="<?php echo e(old('description', isset($data) ? $data->description : '')); ?>"
                        aria-invalid="true">
                    <?php if($errors->has('description')): ?>
                        <label id="description-error" class="error mt-2 text-danger" for="description">Please
                            enter a Description</label>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label for="startDate">Start Date & Time</label>
                    <input readonly type="datetime-local" class="form-control form-control-danger"
                        id="startDate" name="startDate" autocomplete="off"
                        value="<?php echo e(old('startDate', isset($data) ? $data->start_date_time : '')); ?>"
                        aria-invalid="true">
                    <?php if($errors->has('startDate')): ?>
                        <label id="startDate-error" class="error mt-2 text-danger" for="startDate">Please enter
                            a date</label>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">
                    <label for="endDate">End Date & Time</label>
                    <input readonly type="datetime-local" class="form-control form-control-danger"
                        id="endDate" name="endDate" autocomplete="off"
                        value="<?php echo e(old('endDate', isset($data) ? $data->end_date_time : '')); ?>"
                        aria-invalid="true">
                    <?php if($errors->has('endDate')): ?>
                        <label id="endDate-error" class="error mt-2 text-danger" for="endDate">Please enter a
                            date</label>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-3">

                    <?php if(isset($data) && $data->attachment): ?>
                    <label>Attachments</label>
                        <div>
                            <p>Current Attachment:
                                <a href="<?php echo e(asset('storage/'.$data->attachment)); ?>" download> <?php echo e($data->attachment); ?></a>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if($errors->has('attachment')): ?>
                        <label id="attachment-error" class="error mt-2 text-danger" for="attachment">Please
                            choose a file</label>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="location">Location</label>
                    <input readonly type="text" class="form-control form-control-danger" id="location"
                        name="location" autocomplete="off" placeholder="Location"
                        value="<?php echo e(old('location', isset($data) ? $data->location : '')); ?>" aria-invalid="true">
                    <?php if($errors->has('location')): ?>
                        <label id="location-error" class="error mt-2 text-danger" for="location">Please enter
                            a location</label>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-3">
                    <label for="scanLimitations">Number of Scan Limitations</label>
                    <input readonly min="1" type="number" class="form-control form-control-danger"
                        id="scanLimitations" name="scanLimitations" autocomplete="off"
                        placeholder="Scan Limitations"
                        value="<?php echo e(old('scanLimitations', isset($data) ? $data->scan_limitation : '')); ?>"
                        aria-invalid="true">
                    <?php if($errors->has('scanLimitations')): ?>
                        <label id="scanLimitations-error" class="error mt-2 text-danger"
                            for="scanLimitations">Please enter a scan limitations</label>
                    <?php endif; ?>
                </div>
            </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/instance/show.blade.php ENDPATH**/ ?>