<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>LOGIN | CLUB MANAGEMENT SYSTEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />
        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/dropify.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link  href="<?php echo e(asset('assets/libs/toastr/build/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/libs/twitter-bootstrap-wizard/prettify.css')); ?>">
        <?php echo $__env->yieldContent("page-css"); ?>
    </head>

    
    <body data-sidebar="light" data-keep-enlarged="true" class="vertical-collpsed" data-layout-size="boxed">
        <div class="container-fluid p-0">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenu/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/node-waves/waves.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/pages/form-validation.init.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/select2/js/select2.min.js')); ?>"></script>



        <!-- twitter-bootstrap-wizard js -->
        <script src="<?php echo e(asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/libs/twitter-bootstrap-wizard/prettify.js')); ?>"></script>

        <!-- form wizard init -->
        <script src="<?php echo e(asset('assets/js/pages/form-wizard.init.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/dropify.min.js')); ?>"></script>
         <!-- toastr plugin -->
         <script src="<?php echo e(asset('assets/libs/toastr/build/toastr.min.js')); ?>"></script>
         <?php echo $__env->make('administrative.layouts.partial._toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
        <?php echo $__env->yieldContent("page-js"); ?>
        <script>$('.select2').select2();</script>
    </body>

</html>
<?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/app.blade.php ENDPATH**/ ?>