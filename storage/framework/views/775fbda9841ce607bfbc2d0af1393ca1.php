<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Instance Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_instance')): ?>
                        <a href="<?php echo e(route('administrative.instance')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Instance List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.instance.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group  mb-3">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input required type="text" class="form-control form-control-danger" id="name"
                            name="name" autocomplete="off" placeholder="Name"
                            value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('name')): ?>
                            <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                                name</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="description">Description<span class="text-danger">*</span></label>
                        <input required type="text" class="form-control form-control-danger" id="description"
                            name="description" autocomplete="off" placeholder="Description"
                            value="<?php echo e(old('description', isset($data) ? $data->description : '')); ?>"
                            aria-invalid="true">
                        <?php if($errors->has('description')): ?>
                            <label id="description-error" class="error mt-2 text-danger" for="description">Please
                                enter a Description</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="startDate">Start Date & Time<span class="text-danger">*</span></label>
                        <input required type="datetime-local" class="form-control form-control-danger" id="startDate"
                            name="startDate" autocomplete="off"
                            value="<?php echo e(old('startDate', isset($data) ? $data->startDate : '')); ?>"
                            aria-invalid="true">
                        <?php if($errors->has('startDate')): ?>
                            <label id="startDate-error" class="error mt-2 text-danger" for="startDate">Please enter
                                a date</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="endDate">End Date & Time<span class="text-danger">*</span></label>
                        <input required type="datetime-local" class="form-control form-control-danger" id="endDate"
                            name="endDate" autocomplete="off"
                            value="<?php echo e(old('endDate', isset($data) ? $data->endDate : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('endDate')): ?>
                            <label id="endDate-error" class="error mt-2 text-danger" for="endDate">Please enter a
                                date</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="attachment">Attachments</label>
                        <input type="file" class="form-control form-control-danger" id="attachment"
                            name="attachment" autocomplete="off"
                            value="<?php echo e(old('attachment', isset($data) ? $data->attachment : '')); ?>"
                            aria-invalid="true">
                        <?php if($errors->has('attachment')): ?>
                            <label id="attachment-error" class="error mt-2 text-danger" for="attachment">Please
                                choose a file</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="location">Location<span class="text-danger">*</span></label>
                        <input required type="text" class="form-control form-control-danger" id="location"
                            name="location" autocomplete="off" placeholder="Location"
                            value="<?php echo e(old('location', isset($data) ? $data->location : '')); ?>"
                            aria-invalid="true">
                        <?php if($errors->has('location')): ?>
                            <label id="location-error" class="error mt-2 text-danger" for="location">Please enter
                                a location</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="scanLimitations">Number of Scan Limitations<span class="text-danger">*</span></label>
                        <input required min="1" type="number" class="form-control form-control-danger"
                            id="scanLimitations" name="scanLimitations" autocomplete="off"
                            placeholder="Scan Limitations"
                            value="<?php echo e(old('scanLimitations', isset($data) ? $data->scanLimitations : '')); ?>"
                            aria-invalid="true">
                        <?php if($errors->has('scanLimitations')): ?>
                            <label id="scanLimitations-error" class="error mt-2 text-danger"
                                for="scanLimitations">Please enter a scan limitations</label>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo e(route('administrative.instance')); ?>" class="ml-3 btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/instance/create.blade.php ENDPATH**/ ?>