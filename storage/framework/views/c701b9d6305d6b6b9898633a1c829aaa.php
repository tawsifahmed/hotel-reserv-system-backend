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
                        <a href="#seller-details" class="nav-link active" data-toggle="tab">
                            <span class="step-number">01</span>
                            <span class="step-title">Basic<br> Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#company-document" class="nav-link " data-toggle="tab">
                            <span class="step-number">02</span>
                            <span class="step-title">Personal<br> Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#bank-detail" class="nav-link" data-toggle="tab">
                            <span class="step-number">03</span>
                            <span class="step-title">Education<br> & Occupation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#confirm-detail" class="nav-link" data-toggle="tab">
                            <span class="step-number">04</span>
                            <span class="step-title">Spouse/Dependent<br> & Nominee</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#bank-detail" class="nav-link" data-toggle="tab">
                            <span class="step-number">05</span>
                            <span class="step-title">JCI & CLUB &<br> Reference Information</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content twitter-bs-wizard-tab-content">
                    <form enctype="multipart/form-data"
                    action="<?php echo e(route('user.profile.update')); ?>" method="POST" autocomplete="off" class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="step" value="one"/>
                        <div class="row mb-3">
                            <label for="example-month-input" class="col-sm-2 col-form-label">Type of Member<span class="text-danger">*</span></label>
                            <div class="col-sm-10 pt-2">
                                <?php $__currentLoopData = $typeMembership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="radio-inline mb-0">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" <?php echo e($key == 0 ? 'checked' : ''); ?> value="<?php echo e($type->id); ?>" <?php echo e(old('type_of_member' == $type->id, isset($profile) ? ($profile->type_of_member == $type->id?'checked':'' ): '')); ?> type="radio" name="type_of_member"
                                                id="permanent<?php echo e($type->id); ?>">
                                            <label class="form-check-label capitalize" for="permanent<?php echo e($type->id); ?>">
                                                <?php echo e($type->title); ?>

                                            </label>
                                        </div>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="text" value="<?php echo e(old('name',isset($profile) ?$profile->name:'')); ?>" name="name" placeholder=""
                                    id="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Date of Birth<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" required type="date" value="<?php echo e(old('date_of_birth',isset($profile) ?$profile->date_of_birth:'')); ?>" name="date_of_birth" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NID Number<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" required type="text" value="<?php echo e(old('nid_number',isset($profile) ?$profile->nid_number:'')); ?>" name="nid_number" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Passport Number<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" name="passport_number"  value="<?php echo e(old('passport_number',isset($profile) ?$profile->passport_number:'')); ?>" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Photo<span class="text-danger">*</span></label>
                            <div class="col-sm-3 mb-2">
                                <input <?php echo e($profile->user->thumbnail?'':'required'); ?> type="file"  name="image"  class="form-control dropify" data-default-file="<?php echo e(old('image',isset($profile) ?$profile->user->thumbnail:'')); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">NID<span class="text-danger">*</span></label>
                            <div class="col-sm-3 mb-2">
                                <input <?php echo e($profile->nid_image?'':'required'); ?> type="file"  name="nid_image"  class="form-control dropify" data-default-file="<?php echo e(old('nid_image',isset($profile) ?$profile->nid_image:'')); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">ETIN/TIN<span class="text-danger">*</span></label>
                            <div class="col-sm-3 mb-2">
                                <input <?php echo e($profile->tin_image?'':'required'); ?> type="file"  name="etin_image"  class="form-control dropify" data-default-file="<?php echo e(old('etin_image',isset($profile) ?$profile->tin_image:'')); ?>" >
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div></div>
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
            $('.dropify').dropify({
                messages: {
                    'default': '',
                    'replace': '',
                    'remove':  'Remove',
                }
            });
        })
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Projects\club-management-system\resources\views/frontend/profile/step-one.blade.php ENDPATH**/ ?>