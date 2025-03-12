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
                        <a href="<?php echo e(route('user.profile',['page'=>4])); ?>" class="nav-link active">
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
                        <input type="hidden" name="step" value="four"/>

                        <div class="row mb-3 mt-3" >
                            <p class="form-title mb-0"><b>SPOUSE DETAILS</b></p>
                        </div>

                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('spouse_name',isset($profile) ?$profile->spouse_name:'')); ?>" name="spouse_name" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Date of Birth</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('spouse_date_of_birth',isset($profile) ?$profile->spouse_date_of_birth:'')); ?>" name="spouse_date_of_birth" type="date" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Mobile No.</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('spouse_mobile_no',isset($profile) ?$profile->spouse_mobile_no:'')); ?>" name="spouse_mobile_no" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NID</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('spouse_nid',isset($profile) ?$profile->spouse_nid:'')); ?>" name="spouse_nid" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="customPhotofour" class="col-sm-2 col-form-label">Spouse NID Photo</label>
                            <div class="col-sm-3 mb-2">
                                <input type="file"  name="spouse_nid_img"  class="form-control dropify" data-default-file="<?php echo e(old('spouse_nid_img',isset($profile) ?$profile->spouse_nid_image:'')); ?>" >
                            </div>
                        </div>

                        <div class="row mb-4 mt-5">
                            <p class="form-title mb-0"><b>DEPENDENT DETAIL</b></p>
                        </div>
                        <?php if(count($profile->dependent) > 0): ?>
                            <?php $__currentLoopData = $profile->dependent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $dependent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="dependent-container">
                                <div class="dependent-entry mt-3">
                                    <div class="row mb-3">
                                        <div class="">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger btn-remove-dependent btn-sm">
                                                    <i class="ri-close-line mr-2"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="dependent[<?php echo e($key+1); ?>][name]"
                                                placeholder="" value="<?php echo e(old('name',$dependent->name)); ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="dependent[<?php echo e($key+1); ?>][date_of_birth]" value="<?php echo e(old('date_of_birth',$dependent->date_of_birth)); ?>" type="date" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Blood Group</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="dependent[<?php echo e($key+1); ?>][blood_group]"
                                                placeholder="" value="<?php echo e(old('blood_group',$dependent->blood_group)); ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Occupation</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="dependent[<?php echo e($key+1); ?>][occupation]"
                                                placeholder=""  value="<?php echo e(old('occupation',$dependent->occupation)); ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">NID (if any)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="dependent[<?php echo e($key+1); ?>][nid_number]"
                                                placeholder=""  value="<?php echo e(old('nid_number',$dependent->nid_number)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div id="dependent-container">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="dependent[1][name]"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="dependent[1][date_of_birth]" type="date" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Blood Group</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="dependent[1][blood_group]"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Occupation</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="dependent[1][occupation]"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">NID (if any)</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="dependent[1][nid_number]"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="row mb-3">
                            <div class="">
                                <button id="add-more-dependent-btn" class="btn btn-light btn-sm" style="float: right">
                                    <i class="ri-add-fill mr-2"></i> More Dependent</button>
                            </div>
                        </div>

                        <div class="row mb-3 mt-5" >
                            <p class="form-title text-uppercase mb-0"><b>Nominee Details</b></p>
                        </div>

                        <div class="row mb-3 mt-4">
                            <label class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input required class="form-control" value="<?php echo e(old('nominee_name',isset($profile) ?$profile->nominee_name:'')); ?>" name="nominee_name" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Relationship<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select required class="form-control select2" name="nominee_relationship">
                                    <option value="0">Select Relation</option>
                                    <option value="Spouse"  <?php echo e(old('nominee_relationship',$profile->nominee_relationship) == 'Spouse' ? 'Selected' : ''); ?>>Spouse</option>
                                    <option value="Dependent" <?php echo e(old('nominee_relationship',$profile->nominee_relationship) == 'Dependent' ? 'Selected' : ''); ?>>Dependent</option>
                                    <option value="Father" <?php echo e(old('nominee_relationship',$profile->nominee_relationship) == 'Father' ? 'Selected' : ''); ?>>Father</option>
                                    <option value="Mother" <?php echo e(old('nominee_relationship',$profile->nominee_relationship) == 'Mother' ? 'Selected' : ''); ?>>Mother</option>
                                    <option value="Others" <?php echo e(old('nominee_relationship',$profile->nominee_relationship) == 'Others' ? 'Selected' : ''); ?>>Others</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Address<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea required class="form-control" name="nominee_address"><?php echo e(old('nominee_address',isset($profile) ?$profile->nominee_address:'')); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Contact No.<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" required name="nominee_phone" value = "<?php echo e(old('nominee_phone',isset($profile) ?$profile->nominee_phone:'')); ?>"/>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <div>
                                <a href="<?php echo e(route('user.profile', ['page'=>3])); ?>" class="btn btn-info">Previous</a>
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
        $('.dropify').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove':  'Remove',
            }
        });

        let dependentCount = 1;

        $('#add-more-dependent-btn').on('click', function(e) {
            dependentCount++;
            e.preventDefault();
            let newDependentFields = `
            <div class="dependent-entry mt-3">
                <div class="row mb-3">
                    <div class="">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-danger btn-remove-dependent btn-sm">
                                <i class="ri-close-line mr-2"></i> Remove</button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="dependent[${dependentCount}][name]"
                            placeholder="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Date of Birth</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="dependent[${dependentCount}][date_of_birth]" type="date" placeholder="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Blood Group</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="dependent[${dependentCount}][blood_group]"
                            placeholder="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Occupation</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="dependent[${dependentCount}][occupation]"
                            placeholder="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">NID (if any)</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="dependent[${dependentCount}][nid_number]"
                            placeholder="">
                    </div>
                </div>
            </div>`;
            $('#dependent-container').append(newDependentFields);
        });

        $(document).on('click', '.btn-remove-dependent', function() {
            $(this).closest('.dependent-entry').remove();
        });

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/step-four.blade.php ENDPATH**/ ?>