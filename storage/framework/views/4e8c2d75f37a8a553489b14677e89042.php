<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>CLUB MANAGEMENT SYSTEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />
        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link  href="<?php echo e(asset('assets/libs/toastr/build/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />

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

         <!-- toastr plugin -->
         <script src="<?php echo e(asset('assets/libs/toastr/build/toastr.min.js')); ?>"></script>
         <?php echo $__env->make('administrative.layouts.partial._toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
        <?php echo $__env->yieldContent("page-js"); ?>
    </body>

</html>
<?php /**PATH D:\laragon\www\B Charge\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>
