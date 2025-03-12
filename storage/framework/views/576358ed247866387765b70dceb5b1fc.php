<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>DASHBOARD | CLUB MANAGEMENT SYSTEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="CLUB MANAGEMENT SYSTEM" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />

        <!-- jquery.vectormap css -->
        <link href="<?php echo e(asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="<?php echo e(asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css">

        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link  href="<?php echo e(asset('assets/libs/toastr/build/toastr.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/dropify.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="<?php echo e(asset('assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />

        <?php echo $__env->yieldContent('page-css'); ?>

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php echo $__env->make('administrative.layouts.partial._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <?php echo $__env->make('administrative.layouts.partial._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- Sidebar -->

                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="loading">
                            <div></div>
                            <div></div>
                        </div>

                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
                <!-- End Page-content -->
                <?php echo $__env->make('administrative.layouts.partial._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenu/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/node-waves/waves.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/select2/js/select2.min.js')); ?>"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php echo e(asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')); ?>"></script>

        <!-- Required datatable js -->
        <script src="<?php echo e(asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

        <!-- Responsive examples -->
        <script src="<?php echo e(asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/pages/form-validation.init.js')); ?>"></script>

        <!-- Sweet Alerts js -->
        <script src="<?php echo e(asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/axios.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/dropify.min.js')); ?>"></script>

        <!-- toastr plugin -->
        <script src="<?php echo e(asset('assets/libs/toastr/build/toastr.min.js')); ?>"></script>
        <?php echo $__env->make('administrative.layouts.partial._toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- App js -->
        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>

        <?php echo $__env->yieldContent('page-js'); ?>
        <script>$('.select2').select2();</script>

        <script>
            $(document).ready(function() {
                notificationCount();
                notification();
                function notificationCount() {
                    $.ajax({
                        url: "<?php echo e(route('administrative.notification.count')); ?>",
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
                        url: "<?php echo e(route('administrative.notification.list')); ?>",
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

            $(window).on('load',function(){
                $('.loading').fadeOut('slow');
            });
        </script>

    </body>


</html>
<?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/layouts/master.blade.php ENDPATH**/ ?>