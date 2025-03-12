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
                        <input type="hidden" name="step" value="six"/>

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
                            <label class="col-sm-2 col-form-label">Mobile No.</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('spouse_mobile_no')); ?>" name="spouse_mobile_no" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NID</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo e(old('spouse_nid')); ?>" name="spouse_nid" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="customPhotoOne" class="col-sm-2 col-form-label">Spouse NID Photo</label>
                            <div class="col-sm-3 mb-2">
                                <input type="file"  name="spouse_nid_image"  class="form-control dropify" data-default-file="<?php echo e(old('spouse_nid_image')); ?>" >
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
            $('.dropify').dropify({
                messages: {
                    'default': '',
                    'replace': '',
                    'remove':  'Remove',
                }
            });


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
        })

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/step-six.blade.php ENDPATH**/ ?>