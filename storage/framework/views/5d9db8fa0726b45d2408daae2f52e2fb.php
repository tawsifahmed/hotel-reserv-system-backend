<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Guest Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_guest')): ?>
                        <a href="<?php echo e(route('administrative.guest.user')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Guest List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="forms-sample" action="#" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>

                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name">Full Name</label>
                        <input readonly type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('name')): ?>
                        <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                            name</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="organisation">Organisation Name</label>
                        <input readonly type="text" class="form-control form-control-danger" id="organisation" name="organisation" autocomplete="off" placeholder="Organisation name" value="<?php echo e(old('organisation', isset($data) ? $data->organisation : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('organisation')): ?>
                        <label id="organisation-error" class="error mt-2 text-danger" for="organisation">Please enter
                            a organisation name</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone number</label>
                        <input readonly type="text" class="form-control form-control-danger" id="phone" name="phone" autocomplete="off" placeholder="phone number" value="<?php echo e(old('organisation', isset($data) ? $data->phone : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('phone')): ?>
                        <label id="phone-error" class="error mt-2 text-danger" for="phone">Please enter
                            a phone</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email Address</label>
                        <input readonly type="email" class="form-control form-control-danger" id="email" name="email" autocomplete="off" placeholder="Email Address" value="<?php echo e(old('email', isset($data) ? $data->email : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('email')): ?>
                        <label id="email-error" class="error mt-2 text-danger" for="email">Please enter
                            a email address</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="type">Guest Type</label>
                        <input readonly type="email" class="form-control form-control-danger" id="type" name="type" autocomplete="off" placeholder="Type" value="<?php echo e(old('type', isset($data) ? ucfirst($data->type) : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('type')): ?>
                        <label id="email-error" class="error mt-2 text-danger" for="email">Please enter
                            a type</label>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($data->instance_id)): ?>
                    <div class="form-group mb-3">
                        <label for="instance_id">Select Instance</label>
                        <input readonly type="text" class="form-control form-control-danger" id="instance_id" name="instance_id" autocomplete="off" value="<?php echo e(old('instance_id', isset($data) ? $instances->instance_id : '')); ?>" aria-invalid="true">

                        <?php if($errors->has('instance_id')): ?>
                        <label id="instance_id-error" class="error mt-2 text-danger" for="role">Please select a
                            instance</label>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($data->start_date_time) || !empty($data->end_date_time)): ?>
                    <div class="form-group mb-3">
                        <label for="start_date_time">Start Date & Time</label>
                        <input readonly type="datetime-local" class="form-control form-control-danger" id="start_date_time" name="start_date_time" autocomplete="off" value="<?php echo e(old('start_date_time', isset($data) ? $data->start_date_time : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('start_date_time')): ?>
                        <label id="start_date_time-error" class="error mt-2 text-danger" for="start_date_time">Please enter
                            a date</label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="end_date_time">End Date & Time</label>
                        <input readonly type="datetime-local" class="form-control form-control-danger" id="end_date_time" name="end_date_time" autocomplete="off" value="<?php echo e(old('end_date_time', isset($data) ? $data->end_date_time : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('end_date_time')): ?>
                        <label id="end_date_time-error" class="error mt-2 text-danger" for="end_date_time">Please enter a
                            date</label>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($data->scan_limitation)): ?>
                    <div class="form-group mb-3">
                        <label for="scan_limitation">Number of Scan Limitations</label>
                        <input readonly min="1" type="number" class="form-control form-control-danger"
                               id="scan_limitation" name="scan_limitation" autocomplete="off"
                               placeholder="Scan Limitations"
                               value="<?php echo e(old('scan_limitation', isset($data) ? $data->scan_limitation : '')); ?>"
                               aria-invalid="true">
                        <?php if($errors->has('scan_limitation')): ?>
                        <label id="scan_limitation-error" class="error mt-2 text-danger"
                               for="scan_limitation">Please enter a scan limitations</label>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group  mb-3">
                        <label for="scan_limitation">Invitation Link</label>
                        <div class="d-flex">
                            <input readonly type="text" class="form-control form-control-danger" id="myInput" name="myInput" autocomplete="off" value="<?php echo e(url($url)); ?>" aria-invalid="true">
                            <!-- The button used to copy the text -->
                            <a class="copy-button btn btn-light " onclick="myFunction()">
                                <i class="fas fa-copy copy"></i>
                                <i class="fas fa-check check d-none"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="scan_limitation">Invitation QR Code</label>
                        <div class="content__button">
                            <div class="my-3">
                                <?php echo QrCode::size(150)->color(74, 35, 90)->generate($qr); ?>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<script>
    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");
        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        // Copy the text inside the ext field
        navigator.clipboard.writeText(copyText.value);
        // Alert the copied text
        document.querySelector('.copy').classList.add('d-none');
        document.querySelector('.check').classList.remove('d-none');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/guest-user/show.blade.php ENDPATH**/ ?>