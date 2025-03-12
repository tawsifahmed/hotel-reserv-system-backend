<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>LOGIN | CLUB MANAGEMENT SYSTEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />
        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
          <!-- DataTables -->
          <link href="<?php echo e(asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

          <!-- Responsive datatable examples -->
          <link href="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/dropify.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link  href="<?php echo e(asset('assets/libs/toastr/build/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/libs/twitter-bootstrap-wizard/prettify.css')); ?>">
        <?php echo $__env->yieldContent("page-css"); ?>
    </head>

    
    <body data-sidebar="light" data-keep-enlarged="true" class="vertical-collpsed" data-layout-size="boxed">
        <div class="container-fluid p-0">
              <!-- Begin page -->
                <div id="layout-wrapper">

                    <?php echo $__env->make('frontend.layouts.partial._navber', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- ========== Left Sidebar Start ========== -->
                    <?php echo $__env->make('frontend.layouts.partial._sideber', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- Left Sidebar End -->

                    <!-- ============================================================== -->
                    <!-- Start right Content here -->
                    <!-- ============================================================== -->

                    <div class="main-content">

                        <div class="page-content">
                            <div class="container-fluid">
                                <?php echo $__env->yieldContent('content'); ?>
                            </div> <!-- container-fluid -->
                        </div>
                        <!-- End Page-content -->

                        <?php echo $__env->make('frontend.layouts.partial._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- end main content-->

                </div>
                <!-- END layout-wrapper -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenu/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/node-waves/waves.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/pages/form-validation.init.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/select2/js/select2.min.js')); ?>"></script>
      <!-- Required datatable js -->
      <script src="<?php echo e(asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

      <!-- Responsive examples -->
      <script src="<?php echo e(asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
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
        <script>$('.select2').select2();</script>
        <?php echo $__env->yieldContent("page-js"); ?>

        <script>
            $(document).ready(function() {
                notificationCount();
                notification();
                function notificationCount() {
                    $.ajax({
                        url: "<?php echo e(route('user.notification.count')); ?>",
                        type: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if(response.count > 0){
                                $('.dot').html('<span class="noti-dot"></span>');
                            }else{
                                $('.dot').html('');
                            }
                        },
                        error: function(error) {
                            console.error('AJAX Error:', error);
                        }
                    });
                }

                function notification() {
                    $.ajax({
                        url: "<?php echo e(route('user.notification.list')); ?>",
                        type: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('.noptify').html(response);
                        },
                        error: function( error) {
                            console.error('AJAX Error:', error);
                        }
                    });
                }
            });




        </script>
    </body>

</html>
<?php /**PATH E:\Projects\club-management-system\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>