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
                        <a href="#seller-details" class="nav-link" data-toggle="tab">
                            <span class="step-number">01</span>
                            <span class="step-title">Seller Details</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#company-document" class="nav-link" data-toggle="tab">
                            <span class="step-number">02</span>
                            <span class="step-title">Company Document</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#bank-detail" class="nav-link" data-toggle="tab">
                            <span class="step-number">03</span>
                            <span class="step-title">Bank Details</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#confirm-detail" class="nav-link" data-toggle="tab">
                            <span class="step-number">04</span>
                            <span class="step-title">Confirm Detail</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#confirm-detail" class="nav-link" data-toggle="tab">
                            <span class="step-number">05</span>
                            <span class="step-title">Confirm Detail</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content twitter-bs-wizard-tab-content">
                    <form enctype="multipart/form-data"
                    action="<?php echo e(route('user.profile.update')); ?>"  method="POST" autocomplete="off" class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="step" value="seven"/>

                        <div class="row mb-4 mt-5">
                            <p class="form-title mb-0"><b>DEPENDENT DETAIL</b></p>
                        </div>

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
                                <input required class="form-control" value="<?php echo e(old('nominee_name')); ?>" name="nominee_name" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Relationship<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select required class="form-control select2" name="nominee_relationship">
                                    <option value="0">Select Relation</option>
                                    <option value="Spouse"  <?php echo e(old('nominee_relationship') == 'Spouse' ? 'Selected' : ''); ?>>Spouse</option>
                                    <option value="Dependent" <?php echo e(old('nominee_relationship') == 'Dependent' ? 'Selected' : ''); ?>>Dependent</option>
                                    <option value="Father" <?php echo e(old('nominee_relationship') == 'Father' ? 'Selected' : ''); ?>>Father</option>
                                    <option value="Mother" <?php echo e(old('nominee_relationship') == 'Mother' ? 'Selected' : ''); ?>>Mother</option>
                                    <option value="Others" <?php echo e(old('nominee_relationship') == 'Others' ? 'Selected' : ''); ?>>Others</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Address<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea required class="form-control" name="nominee_address"><?php echo e(old('nominee_address')); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Contact No.<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" required name="nominee_phone" value = "<?php echo e(old('nominee_phone')); ?>"/>
                            </div>
                        </div>


                        <div class="row mb-3 mt-5">
                            <p class="form-title"><b>REFERENCE</b></p>
                        </div>

                        
                        
                        
                        
                        
                        

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Proposed By<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select required class="form-control select2" name="proposed_by">
                                    <option value="0">Select a Member</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old("proposed_by") == $user->id ? 'selected' : ''); ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Seconded by<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select required class="form-control select2" name="second_by">
                                    <option value="0">Select a Member</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old("second_by") == $user->id ? 'selected' : ''); ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <div>
                                <a href="<?php echo e(route('user.profile', ['page'=>5])); ?>" class="btn btn-info">Prev</a>
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
            </div>
        `;
                $('#dependent-container').append(newDependentFields);
            });

            $(document).on('click', '.btn-remove-dependent', function() {
                $(this).closest('.dependent-entry').remove();
            });
        });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/step-seven.blade.php ENDPATH**/ ?>