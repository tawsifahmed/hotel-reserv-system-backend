<?php $__env->startSection('page-css'); ?>
<style>
/* password field */
.toggle-password{
    position: absolute;
    top: 17px;
    right: 17px;
    font-size: 24px;
    color: #00407085;
}
video {
    /* position: absolute;
    top: 0;
    left: 0; */
    width: 100%;
    height: 100%;
    object-fit: cover; Ensures the video covers the screen
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row g-0">
    <div class="col-lg-8">
        <div class="authentication-bg">
            <div class="bg-overlay"></div>
            <video autoplay muted loop>
                <source src="<?php echo e(asset('assets/video/intro-video.mp4')); ?>" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
            <div class="w-100">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div>
                            <div class="text-center">
                                <div>
                                    <a href="<?php echo e(url('/')); ?>" class="">
                                        <img src="<?php echo e(asset('assets/images/logo-dark.png')); ?>" alt="" width="200" class="auth-logo logo-dark mx-auto">
                                    </a>
                                </div>
                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                <p class="text-muted">Sign up to B Charge.</p>
                            </div>
                            <?php if($errors->any()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first()); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <div class="mt-3">
                                <form id="register" method="post" >
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3 auth-form-group-custom mb-4">
                                        <i class="ri-user-3-line auti-custom-input-icon"></i>
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter Full Name">
                                    </div>
                                    <div class="mb-3 auth-form-group-custom mb-4">
                                        <i class="ri-phone-line auti-custom-input-icon"></i>
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="01710000000">
                                    </div>

                                    <div id="otp-input" class="mb-3 auth-form-group-custom mb-4 d-none">
                                        <i class="ri-smartphone-line auti-custom-input-icon"></i>
                                        <label for="otp">OTP</label>
                                        <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter otp">
                                    </div>

                                    <div class="mt-4 text-center">
                                        <button id="click-next" class="btn btn-primary w-md waves-effect waves-light" type="button">Next</button>
                                        <button id="click-submit" class="btn btn-primary w-md waves-effect waves-light d-none" type="submit">Register</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        Already have an account ? <a href="<?php echo e(route('admin.login')); ?>" class="text-primary"> Sign in</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>

<script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $('#password');
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    });
    $(document).ready(function() {
        $('#click-next').on('click',function(e) {
            e.preventDefault();
            var phone_no = $('#phone').val();
            var name = $('#name').val();
            if(phone_no && name){
                // Send an AJAX request
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(route('register.check-phone')); ?>",
                    data: {
                        phone : phone_no
                    },
                    success: function(response) {
                        if(response.code == 200){
                            $('#otp-input').removeClass('d-none');
                            $('#click-submit').removeClass('d-none');
                            toastr.success(response.message);
                            $('#click-next').addClass('d-none');
                        }else{
                            toastr.error(response.message);
                            $('#click-next').removeClass('d-none');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }else{
                toastr.error('Name / Phone no is required');
            }
        });

        $('#register').submit(function(e) {
            e.preventDefault();
            // Serialize the form data
            const formData = new FormData(this);
            // Send an AJAX request
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('register.post')); ?>",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.code == 200){
                        toastr.success(response.message);
                        window.location.href = response.url;
                    }else{
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors if needed
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\b-charging\resources\views/administrative/register.blade.php ENDPATH**/ ?>