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
                        <a href="<?php echo e(route('user.profile',['page'=>5])); ?>" class="nav-link active">
                            <span class="step-number">05</span>
                            <span class="step-title">JCI & CLUB &<br> Reference Information</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content twitter-bs-wizard-tab-content">
                    <form enctype="multipart/form-data"
                    action="<?php echo e(route('user.profile.update')); ?>" method="POST" autocomplete="off" class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="step" value="five"/>
                        <div class="row mb-3 mt-2">
                            <p class="form-title"><b>JCI INFORMATION</b></p>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Membership in JCI<span class="text-danger">*</span></label>
                            <div class="col-sm-10 pt-2">
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input"  checked <?php echo e(old("membership_in_jic",$profile->membership_in_jic) == "yes" ? 'checked' : ''); ?> value="yes" type="radio" name="membership_in_jic"
                                            id="jic_yes">
                                        <label class="form-check-label" for="jic_yes">
                                            Yes
                                        </label>
                                    </div>
                                </label>
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input"  value="no" <?php echo e(old("membership_in_jic",$profile->membership_in_jic) == "no" ? 'checked' : ''); ?> type="radio" name="membership_in_jic"
                                            id="jic_no">
                                        <label class="form-check-label" for="jic_no">
                                            No
                                        </label>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3 membership_input">
                            <label class="col-sm-2 col-form-label">Chapter name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('chapter_name',isset($profile)?$profile->chapter_name:'')); ?>" type="text" name="chapter_name" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3 membership_input">
                            <label class="col-sm-2 col-form-label">Highest Position Served<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('highest_position_served',isset($profile)?$profile->highest_position_served:'')); ?>" type="text" name="highest_position_served" placeholder="">
                            </div>
                        </div>
                        <div class="row mb-3 membership_input">
                            <label class="col-sm-2 col-form-label">Year<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('highest_position_served_year',isset($profile)?$profile->highest_position_served_year:'')); ?>" type="number" name="highest_position_served_year" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Are you a JCI Bangladesh Foundation Member?</label>
                            <div class="col-sm-10 pt-2">
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" checked <?php echo e(old("is_foundation_member",$profile->is_foundation_member) == "yes" ? 'checked' : ''); ?> value="yes" type="radio" name="is_foundation_member"
                                            id="is_foundation_member_yes">
                                        <label class="form-check-label" for="is_foundation_member_yes">
                                            Yes
                                        </label>
                                    </div>
                                </label>
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input"  value="no" <?php echo e(old("is_foundation_member",$profile->is_foundation_member) == "no" ? 'checked' : ''); ?> type="radio" name="is_foundation_member"
                                            id="is_foundation_member_no">
                                        <label class="form-check-label" for="is_foundation_member_no">
                                            No
                                        </label>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3 foundation_membership_no">
                            <label class="col-sm-2 col-form-label">Foundation Membership No</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('foundation_membership_no',isset($profile)?$profile->foundation_membership_no:'')); ?>" type="number" name="foundation_membership_no" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Have your membership application ever been rejected by other club/institution?<span class="text-danger">*</span></label>
                            <div class="col-sm-10 pt-2">
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" checked value="yes" <?php echo e(old("club_rejection",$profile->club_rejection) == "yes" ? 'checked' : ''); ?> type="radio" name="club_rejection"
                                            id="club_rejection_yes">
                                        <label class="form-check-label" for="club_rejection_yes">
                                            Yes
                                        </label>
                                    </div>
                                </label>
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" <?php echo e(old("club_rejection",$profile->club_rejection) == "no" ? 'checked' : ''); ?> value="no" type="radio" name="club_rejection"
                                            id="club_rejection_no">
                                        <label class="form-check-label" for="club_rejection_no">
                                            No
                                        </label>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3 club_reject_details">
                            <label class="col-sm-2 col-form-label">If yes, furnish Details<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="club_rejection_details" class="form-control" rows="3"><?php echo e(old('club_rejection_details',isset($profile)?$profile->club_rejection_details:'')); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Have you ever been punished for any Criminal offence?<span class="text-danger">*</span></label>
                            <div class="col-sm-10 pt-2">
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" value="yes" <?php echo e(old("criminal_offence",$profile->criminal_offence) == "yes" ? 'checked' : ''); ?> type="radio" name="criminal_offence"
                                            id="criminal_offence_yes">
                                        <label class="form-check-label" for="criminal_offence_yes">
                                            Yes
                                        </label>
                                    </div>
                                </label>
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input checked class="form-check-input" value="no" <?php echo e(old("criminal_offence",$profile->criminal_offence) == "no" ? 'checked' : ''); ?> type="radio" name="criminal_offence"
                                            id="criminal_offence_no">
                                        <label class="form-check-label" for="criminal_offence_no">
                                            No
                                        </label>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Car Owned<span class="text-danger">*</span></label>
                            <div class="col-sm-10 pt-2">
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input checked class="form-check-input" value="yes" <?php echo e(old("car_own",$profile->car_own) == "yes" ? 'checked' : ''); ?> type="radio" name="car_own"
                                            id="car_own_yes">
                                        <label class="form-check-label" for="car_own_yes">
                                            Yes
                                        </label>
                                    </div>
                                </label>
                                <label class="radio-inline">
                                    <div class="form-check" style="margin-right: 15px;">
                                        <input class="form-check-input" value="no" <?php echo e(old("car_own",$profile->car_own) == "no" ? 'checked' : ''); ?> type="radio" name="car_own"
                                            id="car_own_yes">
                                        <label class="form-check-label" for="car_own_yes">
                                            No
                                        </label>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3 car_own_numb">
                            <label class="col-sm-2 col-form-label">If Yes Car Registration Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="car_registrtion_number" value="<?php echo e(old('car_registrtion_number',$profile->car_registrtion_number)); ?>" class="form-control" ></input>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Car Ownership Type<span class="text-danger">*</span></label>
                            <div class="col-sm-10 pt-2">
                                <?php $__currentLoopData = $carOwnershipType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="radio->inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" <?php echo e(old('car_ownership_type' == $cType->id, isset($profile) ? ($profile->car_ownership_type == $cType->id?'checked':'' ): '')); ?> value="<?php echo e($cType->id); ?>" type="radio" name="car_ownership_type"
                                                id="personal_car<?php echo e($cType->id); ?>">
                                            <label class="form-check-label" for="personal_car<?php echo e($cType->id); ?>">
                                                <?php echo e($cType->title); ?>

                                            </label>
                                        </div>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="row mb-3 mt-5">
                            <p class="form-title"><b>MEMBERSHIP DETAILS OF OTHER CLUB/ASSOCIATION/FOUNDATION</b></p>
                        </div>
                        <?php if(count($profile->otherclub) > 0): ?>
                            <?php $__currentLoopData = $profile->otherclub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $otherclub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="club-container">
                                <div class="club-entry">
                                    <div class="row mb-3">
                                        <div class="">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-danger btn-remove-club btn-sm"><i class="ri-close-line mr-2"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Club Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="club[<?php echo e($key+1); ?>][name]"
                                                placeholder="" value="<?php echo e($otherclub->name); ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Membership Number</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="club[<?php echo e($key+1); ?>][membership_number]" type="number" placeholder=""  value="<?php echo e($otherclub->membership_number); ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Membership/Position Type</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="club[<?php echo e($key+1); ?>][type_of_membership]"
                                                placeholder=""  value="<?php echo e($otherclub->type_of_membership); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div id="club-container">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Club Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="club[1][name]"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Membership Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="club[1][membership_number]" type="number" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Membership/Position Type</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="club[1][type_of_membership]"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="row">
                            <div class="">
                                <button id="add-more-club-btn" class="btn btn-light btn-sm" style="float: right">
                                    <i class="ri-add-fill"></i> More Club Info
                                </button>
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
                                        <option <?php echo e(old("proposed_by",$profile->proposed_by) == $user->id ? 'selected' : ''); ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
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
                                        <option <?php echo e(old("second_by",$profile->second_by) == $user->id ? 'selected' : ''); ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                        <div class="d-flex justify-content-between pt-3">
                            <div>
                                <a href="<?php echo e(route('user.profile', ['page'=>4])); ?>" class="btn btn-info">Previous</a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">Submit</button>
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
            $('.membership_input').removeClass('d-none');
            $('input[type=radio][name=membership_in_jic]').change(function() {
                if (this.value == 'yes') {
                    $('.membership_input').removeClass('d-none');
                }
                else if (this.value == 'no') {
                    $('.membership_input').addClass('d-none');
                }
                else{
                    $('.membership_input').addClass('d-none');
                }
            });
            var membership_in_jic = $("input[type=radio][name=membership_in_jic]:checked").val();
            if (membership_in_jic == 'yes') {
                $('.membership_input').removeClass('d-none');
            } else if (membership_in_jic == 'no') {
                $('.membership_input').addClass('d-none');
            } else{
                $('.membership_input').addClass('d-none');
            }

            $('input[type=radio][name=occupation_type]').change(function() {
                if (this.value == '0') {
                    $('.occupation-group').removeClass('d-none');
                }
                else{
                    $('.occupation-group').addClass('d-none');
                }
            });

            $('input[type=radio][name=club_rejection]').change(function() {
                if (this.value == 'yes') {
                    $('.club_reject_details').removeClass('d-none');
                }
                else{
                    $('.club_reject_details').addClass('d-none');
                }
            });
            var club_rejection = $("input[type=radio][name=club_rejection]:checked").val();
            if (club_rejection == 'yes') {
                $('.club_reject_details').removeClass('d-none');
            }else{
                $('.club_reject_details').addClass('d-none');
            }

            $('input[type=radio][name=car_own]').change(function() {
                if (this.value == 'yes') {
                    $('.car_own_numb').removeClass('d-none');
                }
                else{
                    $('.car_own_numb').addClass('d-none');
                }
            });
            var car_own = $("input[type=radio][name=car_own]:checked").val();
            if (car_own == 'yes') {
                $('.car_own_numb').removeClass('d-none');
            }
            else{
                $('.car_own_numb').addClass('d-none');
            }

            $('input[type=radio][name=is_foundation_member]').change(function() {
                if (this.value == 'yes') {
                    $('.foundation_membership_no').removeClass('d-none');
                }
                else{
                    $('.foundation_membership_no').addClass('d-none');
                }
            });
            var foundation_member = $("input[type=radio][name=is_foundation_member]:checked").val();
            if (foundation_member == 'yes') {
                $('.foundation_membership_no').removeClass('d-none');
            }
            else{
                $('.foundation_membership_no').addClass('d-none');
            }

            let clubCount = 1;
            $('#add-more-club-btn').on('click', function(e) {
                clubCount++;
                e.preventDefault();
                let newClubFields = `
                <div class="club-entry">
                    <div class="row mb-3">
                        <div class="">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-remove-club btn-sm"><i class="ri-close-line mr-2"></i> Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Club Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="club[${clubCount}][name]"
                                placeholder="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Membership Number</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="club[${clubCount}][membership_number]" type="number" placeholder="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Membership/Position Type</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="club[${clubCount}][type_of_membership]"
                                placeholder="">
                        </div>
                    </div>
                </div> `;
                $('#club-container').append(newClubFields);
            });

            $(document).on('click', '.btn-remove-club', function() {
                $(this).closest('.club-entry').remove();
            });
        });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/step-five.blade.php ENDPATH**/ ?>