<style>
    label {
        margin-bottom: 3px !important;
        font-size: 10px;
        margin-top: 6px;
    }
</style>

<?php $__env->startSection('content'); ?>
<div class="row g-0">
    <div class="col-lg-4">
        <div  class="authentication-page-content bg-white p-4 d-flex align-items-center min-vh-100">
            <div class="w-100">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div>
                            <div class="text-center">
                                <div>
                                    <a href="<?php echo e(route('user.login')); ?>" class="">
                                        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="90" class="auth-logo logo-dark mx-auto">
                                    </a>
                                </div>
                                <h4 class="font-size-14 mb-0">Create an Appointment</h4>
                            </div>
                            <?php if($errors->any()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first()); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <div class="mt-3">
                                <form class="" method="post"  action="<?php echo e(route('guest-user.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label  class="font-11" for="name">Full Name <strong class="text-danger">*</strong></label>
                                        <input required type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Name" value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                                        <?php if($errors->has('name')): ?>
                                        <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                                            name</label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label  class="font-11" for="organisation">Organisation Name <strong class="text-danger">*</strong></label>
                                        <input required type="text" class="form-control" id="organisation" name="organisation" autocomplete="off" placeholder="Organisation name" value="<?php echo e(old('organisation', isset($data) ? $data->organisation : '')); ?>" aria-invalid="true">
                                        <?php if($errors->has('organisation')): ?>
                                        <label id="organisation-error" class="error mt-2 text-danger" for="organisation">Please enter
                                            a organisation name</label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label  class="font-11" for="phone">Phone number <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" placeholder="Phone number" value="<?php echo e(old('organisation', isset($data) ? $data->phone : '')); ?>" aria-invalid="true">
                                        <?php if($errors->has('phone')): ?>
                                        <label id="phone-error" class="error mt-2 text-danger" for="phone">Please enter
                                            a phone</label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label  class="font-11" for="email">Email Address <strong class="text-danger">*</strong></label>
                                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email Address" value="<?php echo e(old('email', isset($data) ? $data->email : '')); ?>" aria-invalid="true">
                                        <?php if($errors->has('email')): ?>
                                        <label id="email-error" class="error mt-2 text-danger" for="email">Please enter
                                            a email address</label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group d-none">
                                        <label for="type">Select Guest Type</label>
                                        <input type="text" class="form-control" id="type" name="type" value="others" autocomplete="off" placeholder="Email Address" aria-invalid="true">
                                    </div>
                                    <div class="form-group mb-2 <?php echo e($errors->has('referred_person_phone_number') ? 'has-danger' : ''); ?>">
                                        <label  class="font-11" for="referred_person_phone_number">Referred Person's Phone Number <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control"
                                            id="referred_person_phone_number" name="referred_person_phone_number" autocomplete="off"
                                            placeholder="Referred Person's Phone Number"
                                            value="<?php echo e(old('referred_person_phone_number')); ?>"
                                            aria-invalid="true">
                                        <?php if($errors->has('referred_person_phone_number')): ?>
                                            <label id="referred_person_phone_number-error" class="error mt-2 text-danger"
                                                for="referred_person_phone_number">Please enter a Referred Person's Phone Number</label>
                                        <?php endif; ?>
                                    </div>

                                    <div id="user_name_id" class="d-none" form-group mb-2 <?php echo e($errors->has('') ? 'has-danger' : ''); ?>">
                                        <label  class="font-11" for="referred_user_name">Referred Person's Name <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" readonly
                                            id="referred_user_name" name="referred_user_name" autocomplete="off"
                                            placeholder="Referred Person's Name"
                                            value="<?php echo e(old('referred_user_name')); ?>"
                                            aria-invalid="true">
                                        <input type="hidden" class="form-control" readonly
                                         id="referred_user_id" name="referred_user_id" autocomplete="off"
                                            placeholder="Referred Person's id"
                                            value="<?php echo e(old('referred_user_id')); ?>"
                                            aria-invalid="true">
                                        <?php if($errors->has('referred_user_name')): ?>
                                            <label id="referred_user_name-error" class="error mt-2 text-danger"
                                                for="referred_user_name">Please enter a Referred Person's Name</label>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <div  id="user_name_error" class="alert alert-warning d-none mb-0" role="alert">
                                            Referred Person not found !
                                        </div>
                                    </div>

                                     <div class="form-group mb-2 <?php echo e($errors->has('start_date_time') ? 'has-danger' : ''); ?>">
                                        <label  class="font-11" for="start_date_time">Start Date & Time <strong class="text-danger">*</strong></label>
                                        <input type="datetime-local" min="" class="form-control" id="start_date_time" name="start_date_time" autocomplete="off" value="<?php echo e(old('start_date_time', isset($data) ? $data->start_date_time : '')); ?>" aria-invalid="true">
                                        <?php if($errors->has('start_date_time')): ?>
                                        <label id="start_date_time-error" class="error mt-2 text-danger" for="start_date_time">Please enter
                                            a start date time</label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group mb-3 <?php echo e($errors->has('end_date_time') ? 'has-danger' : ''); ?>">
                                        <label class="font-11" for="end_date_time">End Date & Time <strong class="text-danger">*</strong></label>
                                        <input type="datetime-local" class="form-control" id="end_date_time" name="end_date_time" autocomplete="off" value="<?php echo e(old('end_date_time', isset($data) ? $data->end_date_time : '')); ?>" aria-invalid="true">
                                        <?php if($errors->has('end_date_time')): ?>
                                        <label id="end_date_time-error" class="error mt-2 text-danger" for="end_date_time">Please enter a
                                            end date time</label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <button type="submit" id="myButton" class="btn btn-primary button-submit px-20">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="authentication-bg">
            <div class="bg-overlay"></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script>
    const now = new Date();
    const formattedDateTime = now.toISOString().slice(0,16);
    document.getElementById('start_date_time').min = formattedDateTime;
    document.getElementById('end_date_time').min = formattedDateTime;
    $('#myButton').prop('disabled', true);
    $("#referred_person_phone_number").on("change", function() {
       var phone_number = $(this).val();
       $.ajax({
            url: "<?php echo e(route('referred.person.check')); ?>",
            data: {
                'phone_number':phone_number
            },
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if(response.user_name){
                    $('#user_name_id').removeClass('d-none');
                    $('#user_name_error').addClass('d-none');
                    $('#referred_user_name').val(response.user_name);
                    $('#referred_user_id').val(response.user_id);
                    $('#myButton').prop('disabled', false);
                }else{
                    $('#user_name_id').addClass('d-none');
                    $('#user_name_error').removeClass('d-none');
                    $('#referred_user_name').val('');
                    $('#referred_user_id').val('');
                    $('#myButton').prop('disabled', true);
                }
            },
            error: function(error) {
                console.error('AJAX Error:', error);
            }
        });

    });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/appointment.blade.php ENDPATH**/ ?>