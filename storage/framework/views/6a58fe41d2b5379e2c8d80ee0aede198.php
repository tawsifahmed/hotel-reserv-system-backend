<?php $__env->startSection('page-css'); ?>
    <style>
        #reader {
            border-radius: 5px;
            overflow: hidden;
        }

        #reader__scan_region {
            min-height: 300px !important;
        }
        #reader__scan_region img {
            padding-top: 15%;
        }
        #reader__dashboard_section_fsr span{
           display: none;
        }
        #reader__dashboard_section {
            display: flex;
            justify-content: space-between;
        }

        #reader__dashboard_section a {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            background: #f0f0f0;
            color: #000;
            text-decoration: none !important;
            display: block;
        }

        #reader__dashboard_section a:hover {
            background: #edd3fd;
        }

        #reader__dashboard_section_csr button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        #reader__dashboard_section_csr button:hover {
            background: #edd3fd;
        }

        .icon-size {
            height: 50px !important;
            width: 50px !important;
        }

        #reader__camera_selection {
            border: 1px solid #dddd;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Scan Now </h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_scan_qr')): ?>
                        <a href="<?php echo e(route('administrative.scan')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Scan List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <div class="message-wrapper"></div>
                <div class="mt-4"></div>
                <div id="reader"></div>
                <div class="mt-3">
                    <h5>SCAN RESULT</h5>
                    <div class="result">Result Here</div>
                </div>
                

                
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
    <script src="<?php echo e(asset('assets/js/html5-qrcode.min.js')); ?>"></script>
    <script type="text/javascript">
        // after success to play camera Webcam Ajax paly to send data to Controller

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
        var lastResult, countResults = 0;
        function onScanSuccess(info) {
            if (info !== lastResult) {
                ++countResults;
                lastResult = info;
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "<?php echo e(route('administrative.scan.check')); ?>",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        data: info
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            swal.fire({
                                icon: "success",
                                button: false,
                                timer: 3000,
                                text: data.message,
                            });

                            $('.result').html(
                                '<div class="alert-icon-area alert alert-success mt-3" role="alert">' +
                                '<div class="alert-icon">' +
                                '<img class="icon-size" src="<?php echo e(asset('frontend/images/success.png')); ?>" alt="layers" class="svg">' +
                            '</div>' +
                            '<div class="alert-content">' +
                            ' <h6 class="alert-heading">' + data.message + '</h6>' +
                            '<p class="mb-0"><strong>' + data.guest.name + '</strong></p> ' +
                            '<p class="mb-0">' + data.guest.organisation + '</p> ' +
                            '<p class="mb-0">' + data.guest.email + '</p> ' +
                            '<p class="mb-0">' + data.guest.phone + '</p> ' +
                            '</div> ' +
                            '</div>');
                        } else {
                            swal.fire({
                                icon: "error",
                                button: false,
                                timer: 3000,
                                text: data.message,
                            });
                            $('.result').html(
                                '<div class="alert-icon-area alert alert-warning mt-3" role="alert">' +
                                '<div class="alert-icon">' +
                                '<img class="icon-size" src="<?php echo e(asset('frontend/images/failed.png')); ?>" alt="layers" class="svg">' +
                            '</div>' +
                            '<div class="alert-content">' +
                            '<p>' + data.message + '</p> ' +
                            '</div> ' +
                            '</div>');
                        }
                    }
                })
            }

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/scan/create.blade.php ENDPATH**/ ?>