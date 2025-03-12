<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-2 text-center">
                               <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="logo-sm-light" height="180">
                            </div>
                            <div class="col-md-8 text-center">
                                <h1 class="pt-4 main-title"><strong>B Charge</strong></h1>
                                <h4>CES (A) 11A, Road-113, Gulshan,Dhaka-1212</h4>
                                <h4 class="pt-3"><strong>APPLICATION FOR MEMBERSHIP</strong></h4>
                                <h5>(PLEASE FILL THE APPLICATION IN BLOCK LETTER)</h5>
                            </div>
                            <div class="form-divider"></div>
                        </div>



                        <form enctype="multipart/form-data"
                        action="<?php echo e(route('member.create')); ?>" method="POST" autocomplete="off" class="needs-validation" novalidate>
                        <?php echo csrf_field(); ?>


                            <div class="row mb-3">
                                <label for="example-month-input" class="col-sm-2 col-form-label">Type of Member<span class="text-danger">*</span></label>
                                <div class="col-sm-10 pt-2">
                                    <?php $__currentLoopData = $typeMembership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="radio-inline mb-0">
                                            <div class="form-check" style="margin-right: 15px;">
                                                <input class="form-check-input" <?php echo e($key == 0 ? 'checked' : ''); ?> value="<?php echo e($type->id); ?>" <?php echo e(old("type_of_member") == $type->id ? 'checked' : ''); ?> type="radio" name="type_of_member"
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
                                    <input class="form-control" required type="text" value="<?php echo e(old('name')); ?>" name="name" placeholder=""
                                        id="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Date of Birth<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" required type="date" value="<?php echo e(old('date_of_birth')); ?>" name="date_of_birth" value="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">NID Number<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" required type="text" value="<?php echo e(old('nid_number')); ?>" name="nid_number" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Passport Number<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" name="passport_number"  value="<?php echo e(old('passport_number')); ?>" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-sm-2 col-form-label">Photo<span class="text-danger">*</span></label>
                                <div class="col-sm-3 mb-2">
                                    <input required type="file"  name="image"  class="form-control dropify" data-default-file="<?php echo e(old('image')); ?>" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-sm-2 col-form-label">NID<span class="text-danger">*</span></label>
                                <div class="col-sm-3 mb-2">
                                    <input required type="file"  name="nid_image"  class="form-control dropify" data-default-file="<?php echo e(old('nid_image')); ?>" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-sm-2 col-form-label">ETIN/TIN<span class="text-danger">*</span></label>
                                <div class="col-sm-3 mb-2">
                                    <input required type="file"  name="etin_image"  class="form-control dropify" data-default-file="<?php echo e(old('etin_image')); ?>" >
                                </div>
                            </div>

                            <div class="row mb-3 pt-5">
                                <p class="form-title"><b>EDUCATIONAL BACKGROUND<b></p>
                            </div>

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
                                        <input required class="form-control" name="education[1][year]"   type="date" placeholder="">
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
                            <div class="row mb-3">
                                <div class="">
                                    <button id="add-more-education-btn" class="btn btn-light btn-sm" style="float: right">
                                        <i class="ri-add-fill"></i> More Degree</button>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Marital Status<span class="text-danger">*</span></label>
                                <div class="col-sm-10  pt-2">
                                    <label class="form-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" value="Married" <?php echo e(old("marrital_status") == 'Married' ? 'checked' : ''); ?> type="radio" name="marrital_status"
                                                id="Married">
                                            <label class="form-check-label" for="Married">
                                                Married
                                            </label>
                                        </div>
                                    </label>
                                    <label class="form-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" value="single" checked <?php echo e(old("marrital_status") == 'single' ? 'checked' : ''); ?> type="radio" name="marrital_status"
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
                                    <input class="form-control" type="date" value="<?php echo e(old('date_of_anniversary')); ?>" name="date_of_anniversary" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">No of Dependents<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="number" value="<?php echo e(old('no_of_dependents')); ?>" name="no_of_dependents" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Father's Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" value="<?php echo e(old('father_name')); ?>" name="father_name" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mother's Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" value="<?php echo e(old('mother_name')); ?>" name="mother_name" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mobile Number<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" required type="text" value="<?php echo e(old('mobile_number')); ?>" name="mobile_number" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Phone Number<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" value="<?php echo e(old('phone_number')); ?>" name="phone_number" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email ID<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" required type="text" value="<?php echo e(old('email_id')); ?>" name="email_id" placeholder="">
                                    <?php if($errors->has('email_id')): ?>
                                        <small id="email_id-error" class="error mt-2 text-danger" for="email_id"><?php echo e($errors->first('email_id')); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Permanent Address<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea required name="permanent_address" class="form-control" rows="3"><?php echo e(old('permanent_address')); ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Present Address<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea required name="present_address" class="form-control" rows="3"><?php echo e(old('present_address')); ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-month-input" class="col-sm-2 col-form-label">Occupation Type<span class="text-danger">*</span></label>
                                <div class="col-sm-10 pt-2">
                                    <?php $__currentLoopData = $occupationType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ocType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" <?php echo e($key == 0 ? 'checked' : ''); ?><?php echo e(old("occupation_type") == $ocType->id ? 'checked' : ''); ?> value="<?php echo e($ocType->id); ?>" type="radio"
                                                name="occupation_type" id="occservice<?php echo e($ocType->id); ?>">
                                            <label class="form-check-label" for="occservice<?php echo e($ocType->id); ?>">
                                                <?php echo e($ocType->title); ?>

                                            </label>
                                        </div>
                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <input class="form-check-input" value="0" type="radio"
                                                name="occupation_type" id="occservice0">
                                    <label class="form-check-label" for="occservice0">
                                        Other
                                    </label>

                                </div>
                            </div>
                            <div class="row mb-3 occupation-group d-none">
                                <label class="col-sm-2 col-form-label ">Others (Please Specify)</label>
                                <div class="col-sm-10">
                                    <textarea name="other_occupation_type" class="form-control" rows="3"><?php echo e(old('other_occupation_type')); ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Designation<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" value="<?php echo e(old('designation')); ?>" name="designation" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Office Address<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea required name="office_address" class="form-control" rows="3"><?php echo e(old('office_address')); ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Office Phone<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" value="<?php echo e(old('office_phone')); ?>" type="text" name="office_phone" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Office Mobile<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" value="<?php echo e(old('office_mobile')); ?>" type="text" name="office_mobile" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Office Email Id<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input required class="form-control" value="<?php echo e(old('office_email_id')); ?>" type="text" name="office_email_id" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Membership in JCI<span class="text-danger">*</span></label>
                                <div class="col-sm-10 pt-2">
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" <?php echo e(old("membership_in_jic") == "yes" ? 'checked' : ''); ?> checked value="yes" type="radio" name="membership_in_jic"
                                                id="jic_yes">
                                            <label class="form-check-label" for="jic_yes">
                                                Yes
                                            </label>
                                        </div>
                                    </label>
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" value="no" <?php echo e(old("membership_in_jic") == "no" ? 'checked' : ''); ?> type="radio" name="membership_in_jic"
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
                                    <input class="form-control" value="<?php echo e(old('chapter_name')); ?>" type="text" name="chapter_name" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3 membership_input">
                                <label class="col-sm-2 col-form-label">Highest Position Served<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('highest_position_served')); ?>" type="text" name="highest_position_served" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3 membership_input">
                                <label class="col-sm-2 col-form-label">Highest Position Served Year<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('highest_position_served_year')); ?>" type="text" name="highest_position_served_year" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Have your membership application ever been rejected by other club/institution?<span class="text-danger">*</span></label>
                                <div class="col-sm-10 pt-2">
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" checked value="yes" <?php echo e(old("club_rejection") == "yes" ? 'checked' : ''); ?> type="radio" name="club_rejection"
                                                id="club_rejection_yes">
                                            <label class="form-check-label" for="club_rejection_yes">
                                                Yes
                                            </label>
                                        </div>
                                    </label>
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" <?php echo e(old("club_rejection") == "no" ? 'checked' : ''); ?> value="no" type="radio" name="club_rejection"
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
                                    <textarea name="club_rejection_details" class="form-control" rows="3"><?php echo e(old('club_rejection_details')); ?></textarea>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Have you ever been punished for any Criminal offence?<span class="text-danger">*</span></label>
                                <div class="col-sm-10 pt-2">
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" value="yes" <?php echo e(old("criminal_offence") == "yes" ? 'checked' : ''); ?> type="radio" name="criminal_offence"
                                                id="criminal_offence_yes">
                                            <label class="form-check-label" for="criminal_offence_yes">
                                                Yes
                                            </label>
                                        </div>
                                    </label>
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input checked class="form-check-input" value="no" <?php echo e(old("criminal_offence") == "no" ? 'checked' : ''); ?> type="radio" name="criminal_offence"
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
                                            <input checked class="form-check-input" value="yes" <?php echo e(old("car_own") == "yes" ? 'checked' : ''); ?> type="radio" name="car_own"
                                                id="car_own_yes">
                                            <label class="form-check-label" for="car_own_yes">
                                                Yes
                                            </label>
                                        </div>
                                    </label>
                                    <label class="radio-inline">
                                        <div class="form-check" style="margin-right: 15px;">
                                            <input class="form-check-input" value="no" <?php echo e(old("car_own") == "no" ? 'checked' : ''); ?> type="radio" name="car_own"
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
                                    <input type="text" name="car_registrtion_number" value="<?php echo e(old('car_registrtion_number')); ?>" class="form-control" ></input>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Car Ownership Type<span class="text-danger">*</span></label>
                                <div class="col-sm-10 pt-2">
                                    <?php $__currentLoopData = $carOwnershipType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="radio->inline">
                                            <div class="form-check" style="margin-right: 15px;">
                                                <input class="form-check-input" <?php echo e($key == 0 ? 'checked' : ''); ?><?php echo e(old("car_ownership_type") == $cType->id ? 'checked' : ''); ?> value="<?php echo e($cType->id); ?>" type="radio" name="car_ownership_type"
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
                            <div class="row">
                                <div class="">
                                    <button id="add-more-club-btn" class="btn btn-light btn-sm" style="float: right">
                                        <i class="ri-add-fill"></i> More Club Info
                                    </button>
                                </div>
                            </div>

                            <div class="row mb-3 mt-5" >
                                <p class="form-title mb-0"><b>SPOUSE DETAILS</b></p>
                            </div>

                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('spouse_name')); ?>" name="spouse_name" type="text" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('spouse_date_of_birth')); ?>" name="spouse_date_of_birth" type="date" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mobile No</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('spouse_mobile_no')); ?>" name="spouse_mobile_no" type="text" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nid</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('spouse_nid')); ?>" name="spouse_nid" type="text" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="customPhotoOne" class="col-sm-2 col-form-label">Spouse Nid Photo</label>
                                <div class="col-sm-3 mb-2">
                                    <input type="file"  name="spouse_nid_image"  class="form-control dropify" data-default-file="<?php echo e(old('spouse_nid_image')); ?>" >
                                </div>
                            </div>

                            <div class="row mb-3 mt-5" >
                                <p class="form-title text-uppercase mb-0"><b>Nominee Details</b></p>
                            </div>

                            <div class="row mb-3 mt-4">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('nominee_name')); ?>" name="nominee_name" type="text" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Relationship</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo e(old('nominee_relationship')); ?>" name="nominee_relationship" type="text" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="nominee_address"><?php echo e(old('nominee_address')); ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="nominee_phone"><?php echo e(old('nominee_phone')); ?></textarea>
                                </div>
                            </div>

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

                            <div class="row mb-3 mt-5">
                                <p class="form-title"><b>BANK DETAILS</b></p>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bank Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo e(old('bank_name')); ?>" name="bank_name"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Branch Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo e(old('branch_name')); ?>" name="branch_name"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Account Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo e(old('account_number')); ?>" name="account_number"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Cheque No Expiry</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" value="<?php echo e(old('check_number_expiry')); ?>" name="check_number_expiry"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" value="<?php echo e(old('amount')); ?>" name="amount"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Date (Check)</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" value="<?php echo e(old('chaque_date')); ?>" name="chaque_date"
                                        placeholder="">
                                </div>
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
                                <label class="col-sm-2 col-form-label">Second by<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select required class="form-control select2" name="second_by">
                                        <option value="0">Select a Member</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old("second_by") == $user->id ? 'selected' : ''); ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div align="right">
                                <button type="submit" class="btn btn-primary mt-3 text-right">
                                    Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
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


            $('input[type=radio][name=car_own]').change(function() {
                if (this.value == 'yes') {
                    $('.car_own_numb').removeClass('d-none');
                }
                else{
                    $('.car_own_numb').addClass('d-none');
                }
            });



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
                        <input class="form-control" name="education[${educationCount}][year]" type="date" placeholder="">
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
        });
    </script>
    <script>
        $(document).ready(function() {
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
            </div>
        `;
                $('#club-container').append(newClubFields);
            });

            $(document).on('click', '.btn-remove-club', function() {
                $(this).closest('.club-entry').remove();
            });
        });
    </script>
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

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/index.blade.php ENDPATH**/ ?>
