<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Invoice Details</h4>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_list')): ?>
                            <a href="<?php echo e(route('administrative.invoice.list')); ?>" class="btn btn-light btn-sm">
                                <i class="ri-list-check"></i>
                            </a>
                        <?php endif; ?>

                        <a href="<?php echo e(route('administrative.invoice.pdf',$invoice->id)); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-file-pdf-fill"></i> PDF
                        </a>
                        <?php if($invoice->status !== 2): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_create')): ?>
                            <a href="<?php echo e(route('administrative.payment.create',base64_encode($invoice->id))); ?>" class="btn btn-sm btn-info"><i class="ri-wallet-3-line"></i></a>
                            <?php endif; ?>
                        <?php endif; ?>
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

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/invoice/show.blade.php ENDPATH**/ ?>