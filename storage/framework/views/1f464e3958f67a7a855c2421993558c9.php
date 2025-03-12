<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Guest Edit</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_guest')): ?>
                        <a href="<?php echo e(route('administrative.guest.user')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Guest List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.guest.user.update', $data->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group mb-3">
                        <label for="name">Full Name</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('name')): ?>
                        <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                            name</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="organisation">Organisation Name</label>
                        <input required type="text" class="form-control form-control-danger" id="organisation" name="organisation" autocomplete="off" placeholder="Organisation name" value="<?php echo e(old('organisation', isset($data) ? $data->organisation : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('organisation')): ?>
                        <label id="organisation-error" class="error mt-2 text-danger" for="organisation">Please enter
                            a organisation name</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="phone">Phone number</label>
                        <input type="text" class="form-control form-control-danger" id="phone" name="phone" autocomplete="off" placeholder="phone number" value="<?php echo e(old('organisation', isset($data) ? $data->phone : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('phone')): ?>
                        <label id="phone-error" class="error mt-2 text-danger" for="phone">Please enter
                            a phone</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control form-control-danger" id="email" name="email" autocomplete="off" placeholder="Email Address" value="<?php echo e(old('email', isset($data) ? $data->email : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('email')): ?>
                        <label id="email-error" class="error mt-2 text-danger" for="email">Please enter
                            a email address</label>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Select Guest Type</label>
                        <div class="radio-horizontal-list d-flex mb-0">
                            <div class="form-check">
                                <input class="form-check-input"  <?php echo e($data->type == 'instance' ? 'checked' :''); ?> type="radio" name="type" value="instance"  id="radio-vl1" checked="">
                                <label class="form-check-label" for="radio-vl1">
                                    Instance
                                </label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="form-check">
                                <input class="form-check-input" <?php echo e($data->type == 'others' ? 'checked' :''); ?> type="radio" name="type" value="others"  id="radio-vl2" checked="">
                                <label class="form-check-label" for="radio-vl2">
                                    Others
                                </label>
                            </div>
                        </div>
                        <?php if($errors->has('type')): ?>
                        <label id="type-error" class="error text-danger" for="role">Please select a
                            type</label>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  mb-3 d-none" id="instance">
                        <label for="status">Select Instance</label>
                        <select name="instance_id" id="instance_id" class="form-control">
                            <option value="">Select Instance</option>
                            <?php $__currentLoopData = $instances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($instance->id); ?>" <?php echo e($data->instance_id == $instance->id ? 'selected' :''); ?>><?php echo e($instance->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('instance_id')): ?>
                        <label id="instance_id-error" class="error mt-2 text-danger" for="role">Please select a
                            instance</label>
                        <?php endif; ?>
                    </div>
                    <div id="others" class="d-none ">
                        <div class="form-group  mb-3">
                            <label for="start_date_time">Start Date & Time</label>
                            <input type="datetime-local" class="form-control form-control-danger" id="start_date_time" name="start_date_time" autocomplete="off" value="<?php echo e(old('start_date_time', isset($data) ? $data->start_date_time : '')); ?>" aria-invalid="true">
                            <?php if($errors->has('start_date_time')): ?>
                            <label id="start_date_time-error" class="error mt-2 text-danger" for="start_date_time">Please enter
                                a date</label>
                            <?php endif; ?>
                        </div>
                        <div class="form-group  mb-3">
                            <label for="end_date_time">End Date & Time</label>
                            <input type="datetime-local" class="form-control form-control-danger" id="end_date_time" name="end_date_time" autocomplete="off" value="<?php echo e(old('end_date_time', isset($data) ? $data->end_date_time : '')); ?>" aria-invalid="true">
                            <?php if($errors->has('end_date_time')): ?>
                            <label id="end_date_time-error" class="error mt-2 text-danger" for="end_date_time">Please enter a
                                date</label>
                            <?php endif; ?>
                        </div>
                        <div class="form-group  mb-3">
                            <label for="scan_limitation">Number of Scan Limitations</label>
                            <input  type="number" class="form-control form-control-danger"
                                id="scan_limitation" name="scan_limitation" autocomplete="off"
                                placeholder="Scan Limitations"
                                value="<?php echo e(old('scan_limitation', isset($data) ? $data->scan_limitation : '')); ?>"
                                aria-invalid="true">
                            <?php if($errors->has('scan_limitation')): ?>
                                <label id="scan_limitation-error" class="error mt-2 text-danger"
                                    for="scan_limitation">Please enter a scan limitations</label>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo e(route('administrative.guest.user')); ?>" class="ml-3 btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<script>
    $(document).ready(function() {
        // on first load
        var type = "<?php echo e($data->type); ?>";
        if (type == 'instance') {
            $('#instance').removeClass('d-none');
            $('#others').addClass('d-none');
        } else if (type == 'others') {
            $('#instance').addClass('d-none');
            $('#others').removeClass('d-none');
        } else {
            $('#instance').addClass('d-none');
            $('#others').addClass('d-none');
        }

        // on change
        $('#radio-vl1, #radio-vl2').on('change', function() {
            var selectedValue = $('input[name="type"]:checked').val();
            if (selectedValue == 'instance') {
                $('#instance').removeClass('d-none');
                $('#others').addClass('d-none');
            } else if (selectedValue == 'others') {
                $('#instance').addClass('d-none');
                $('#others').removeClass('d-none');
            } else {
                $('#instance').addClass('d-none');
                $('#others').addClass('d-none');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/guest-user/edit.blade.php ENDPATH**/ ?>