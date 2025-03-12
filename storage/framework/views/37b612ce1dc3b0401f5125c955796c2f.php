<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Payment & Invoice</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">User</a></li>
                    <li class="breadcrumb-item active">Payment & Invoice</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Invoice Details</h4>
                    <div>
                        <a href="<?php echo e(route('administrative.invoice.pdf',$invoice->id)); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-file-pdf-fill"></i> PDF
                        </a>
                    </div>
                </div>
                <p class="card-title-desc"></p>
                <img id="logo" height="80px" style="position: absolute;top: 75px;z-index: 1;left: 80px;" src="<?php echo e(asset('assets/images/logo-dashboard.png')); ?>" alt="Club JCI" />
                 <?php echo $__env->make('administrative.invoice.pdf.invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/invoice/show.blade.php ENDPATH**/ ?>