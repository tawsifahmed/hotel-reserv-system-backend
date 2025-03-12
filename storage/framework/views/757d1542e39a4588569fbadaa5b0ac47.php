<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">User</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Update Profile</h4>
            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                <ul class="twitter-bs-wizard-nav">
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.profile',['page'=>1])); ?>" class="nav-link active">
                            <span class="step-number">01</span>
                            <span class="step-title">Basic<br> Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.profile',['page'=>2])); ?>" class="nav-link active">
                            <span class="step-number">02</span>
                            <span class="step-title">Personal<br> Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.profile',['page'=>3])); ?>" class="nav-link">
                            <span class="step-number">03</span>
                            <span class="step-title">Education<br> & Occupation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.profile',['page'=>4])); ?>" class="nav-link">
                            <span class="step-number">04</span>
                            <span class="step-title">Spouse/Dependent<br> & Nominee</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.profile',['page'=>5])); ?>" class="nav-link">
                            <span class="step-number">05</span>
                            <span class="step-title">JCI & CLUB &<br> Reference Information</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content twitter-bs-wizard-tab-content">
                    <form enctype="multipart/form-data"
                    action="<?php echo e(route('user.profile.update')); ?>" method="POST" autocomplete="off" class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="step" value="two"/>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Marital Status<span class="text-danger">*</span></label>
                            <div class="col-sm-10  pt-2">
                                <label class="form-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" value="married" checked <?php echo e(old("marrital_status" == 'married', $profile->marrital_status == 'married'  ? 'checked' : '')); ?>  type="radio" name="marrital_status"
                                            id="married">
                                        <label class="form-check-label" for="married">
                                            Married
                                        </label>
                                    </div>
                                </label>
                                <label class="form-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" value="single"  <?php echo e(old("marrital_status" == 'single', $profile->marrital_status == 'single' ? 'checked' : '')); ?> type="radio" name="marrital_status"
                                            id="single">
                                        <label class="form-check-label" for="single">
                                            Single
                                        </label>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Date of Anniversary</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" value="<?php echo e(old('date_of_anniversary',isset($profile) ? $profile->date_of_anniversary:'')); ?>" name="date_of_anniversary" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No of Dependents<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="number" value="<?php echo e(old('no_of_dependents',isset($profile) ? $profile->no_of_dependents:'')); ?>" name="no_of_dependents" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Father's Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" value="<?php echo e(old('father_name',isset($profile) ? $profile->father_name:'')); ?>" name="father_name" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mother's Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" value="<?php echo e(old('mother_name',isset($profile) ? $profile->mother_name:'')); ?>" name="mother_name" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mobile Number<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" required type="text" value="<?php echo e(old('mobile_number',isset($profile) ? $profile->mobile_number:'')); ?>" name="mobile_number" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?php echo e(old('phone_number',isset($profile) ? $profile->phone_number:'')); ?>" name="phone_number" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email ID<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" required type="text" value="<?php echo e(old('email_id',isset($profile) ? $profile->email_id:'')); ?>" name="email_id" placeholder="">
                                <?php if($errors->has('email_id')): ?>
                                    <small id="email_id-error" class="error mt-2 text-danger" for="email_id"><?php echo e($errors->first('email_id')); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Permanent Address<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea required name="permanent_address" class="form-control" rows="3"><?php echo e(old('permanent_address',isset($profile) ? $profile->permanent_address:'')); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Present Address<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea required name="present_address" class="form-control" rows="3"><?php echo e(old('present_address',isset($profile) ? $profile->present_address:'')); ?></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-3">
                            <div>
                                <a href="<?php echo e(route('user.profile', ['page'=>1])); ?>" class="btn btn-info">Previous</a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/step-two.blade.php ENDPATH**/ ?>