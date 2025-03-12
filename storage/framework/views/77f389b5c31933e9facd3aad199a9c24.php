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
                        <a href="<?php echo e(route('user.profile',['page'=>3])); ?>" class="nav-link active">
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
                        <input type="hidden" name="step" value="three"/>
                        <div class="row mb-3 mt-2">
                            <p class="form-title"><b>EDUCATIONAL BACKGROUND</b></p>
                        </div>
                        <?php if(count($profile->education) > 0): ?>
                            <?php $__currentLoopData = $profile->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="education-container">
                                    <div class="education-entry mt-3">
                                        <div class="row mb-3">
                                            <div class="">
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger btn-remove-education btn-sm"><i class="ri-close-line mr-2"></i> Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Name of Institution</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="education[<?php echo e($key+1); ?>][name_of_institution]" value="<?php echo e($education->name_of_institution); ?>" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Year</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="education[<?php echo e($key+1); ?>][year]" value="<?php echo e($education->year); ?>"  type="number" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Degree</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="education[<?php echo e($key+1); ?>][degree]" value="<?php echo e($education->degree); ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div id="education-container">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Name of Institution<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input required class="form-control" type="text" name="education[1][name_of_institution]"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Year<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input required class="form-control"   name="education[1][year]"   type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Degree<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input required class="form-control" type="text" name="education[1][degree]"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row mb-3">
                            <div class="">
                                <button id="add-more-education-btn" class="btn btn-light btn-sm" style="float: right">
                                    <i class="ri-add-fill"></i> More Degree</button>
                            </div>
                        </div>

                        <div class="row mb-3 mt-2">
                            <p class="form-title"><b>OCCUPATION</b></p>
                        </div>
                        <div class="row mb-3">
                            <label for="example-month-input" class="col-sm-2 col-form-label">Occupation Type<span class="text-danger">*</span></label>
                            <div class="col-sm-10 pt-2">
                                <?php $__currentLoopData = $occupationType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ocType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" <?php echo e($key == 0 ? 'checked' : ''); ?>  value="<?php echo e($ocType->id); ?>"  <?php echo e(old('occupation_type' == $ocType->id, isset($profile) ? ($profile->occupation_type == $ocType->id?'checked':'' ): '')); ?> type="radio"
                                            name="occupation_type" id="occservice<?php echo e($ocType->id); ?>">
                                        <label class="form-check-label" for="occservice<?php echo e($ocType->id); ?>">
                                            <?php echo e($ocType->title); ?>

                                        </label>
                                    </div>
                                </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <input class="form-check-input" <?php echo e($profile->occupation_type == 0 ? 'checked' : ''); ?> value="0" type="radio"
                                            name="occupation_type" id="occservice0">
                                <label class="form-check-label" for="occservice0">
                                    Other
                                </label>

                            </div>
                        </div>
                        <div class="row mb-3 occupation-group <?php echo e($profile->occupation_type == 0 ? '' : 'd-none'); ?>">
                            <label class="col-sm-2 col-form-label ">Others (Please Specify)</label>
                            <div class="col-sm-10">
                                <textarea name="other_occupation_type" class="form-control" rows="3"><?php echo e(old('other_occupation_type',isset($profile) ? $profile->other_occupation_type:'')); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Organization<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" value="<?php echo e(old('organization',isset($profile) ?$profile->organization:'' )); ?>" name="organization" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Designation<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" value="<?php echo e(old('designation',isset($profile) ?$profile->designation:'' )); ?>" name="designation" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Office Address<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea required name="office_address" class="form-control" rows="3"><?php echo e(old('office_address',isset($profile) ?$profile->office_address:'' )); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Office Mobile</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('office_mobile',isset($profile) ?$profile->office_mobile:'')); ?>" type="text" name="office_mobile" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Office Phone</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('office_phone',isset($profile) ?$profile->office_phone:'')); ?>" type="text" name="office_phone" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Office Email ID<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" value="<?php echo e(old('office_email_id',isset($profile) ?$profile->office_email_id:'')); ?>" type="text" name="office_email_id" placeholder="">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-3">
                            <div>
                                <a href="<?php echo e(route('user.profile', ['page'=>2])); ?>" class="btn btn-info">Previous</a>
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
<?php $__env->startSection('page-js'); ?>
<script>
    $(document).ready(function() {
        let educationCount = 1;
        $('#add-more-education-btn').on('click', function(e) {
            educationCount++;
            e.preventDefault();
            let newEducationFields = `
                <div class="education-entry mt-3">
                    <div class="row mb-3">
                        <div class="">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-remove-education btn-sm"><i class="ri-close-line mr-2"></i> Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name of Institution</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="education[${educationCount}][name_of_institution]" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Year</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="education[${educationCount}][year]" type="number" placeholder="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Degree</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="education[${educationCount}][degree]" placeholder="">
                        </div>
                    </div>
                </div>
            `;
            $('#education-container').append(newEducationFields);
        });

        $(document).on('click', '.btn-remove-education', function() {
            $(this).closest('.education-entry').remove();
        });

        $('input[type=radio][name=occupation_type]').change(function() {
            if (this.value == '0') {
                $('.occupation-group').removeClass('d-none');
            }
            else{
                $('.occupation-group').addClass('d-none');
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/step-three.blade.php ENDPATH**/ ?>