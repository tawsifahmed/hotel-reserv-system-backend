<?php $__env->startSection('page-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Scan Details</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_scan_qr')): ?>
                        <a href="<?php echo e(route('administrative.scan')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Scan List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-body pb-md-30 mt-2 text-center">
                                <h4>Invitation QR CODE</h4>
                                <div class="my-3">
                                <?php echo QrCode::size(200)->color(74, 35, 90)->generate($history->qr); ?>

                                </div>
                                <h5 class="text-success mb-3">QR Code Already Scan <?php echo e($history->scan_count); ?> Times.</h5>
                                <small class="text-danger"><?php echo e($history->last_scan?'Last Scan: '.date('Y-m-d h:mA',strtotime($history->last_scan->created_at)):''); ?></small>
                                <div class="form-group">
                                    <label for="scan_limitation">Invitation Link</label>
                                    <div class="d-flex">
                                        <input readonly type="text" class="form-control form-control-danger" id="myInput" name="myInput" autocomplete="off" value="<?php echo e(url($history->url)); ?>" aria-invalid="true">
                                        <!-- The button used to copy the text -->
                                        <a class="copy-button btn btn-light" onclick="myFunction()">
                                            <i class="fas fa-copy copy"></i>
                                            <i class="fas fa-check check d-none"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-body pb-md-30 mt-2">
                                <h4>Instance Information</h4>
                                <table class="mt-3">
                                    <tr>
                                        <th>Name</th><td width="30px" class="text-center">:</td><td><?php echo e($history->instances?$history->instances->name:'Office'); ?></td>
                                    </tr>
                                    <?php if($history->instances): ?>
                                    <tr>
                                        <th>Description</th><td width="30px" class="text-center">:</td><td><?php echo e($history->instances->description); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Start Date & Time</th><td width="30px" class="text-center">:</td><td><?php echo e(date('Y-m-d h:mA',strtotime($history->instances->start_date_time))); ?></td>
                                    </tr>
                                    <tr>
                                        <th>End Date & Time</th><td width="30px" class="text-center">:</td><td><?php echo e(date('Y-m-d h:mA',strtotime($history->instances->end_date_time))); ?></td>
                                    </tr>
                                    <?php if($history->instances->attachment): ?>
                                    <tr>
                                        <th>Attachments</th><td width="30px" class="text-center">:</td><td><a href="<?php echo e(asset('storage/'.$history->instances->attachment)); ?>" download><u>Download Attachment</u></a></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th>Location</th><td width="30px" class="text-center">:</td><td><?php echo e($history->instances->location); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Scan Limitations</th><td width="30px" class="text-center">:</td><td><?php echo e($history->instances->scan_limitation); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                        <div class="card card-Vertical card-default card-md mb-4">
                            <div class="card-body pb-md-30 mt-2">
                                <h4>Guest Information</h4>
                                <table class="mt-3">
                                    <tr>
                                        <th>Name</th><td width="30px" class="text-center">:</td><td><?php echo e($history->guests?$history->guests->name:''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th><td width="30px" class="text-center">:</td><td><?php echo e($history->guests?$history->guests->email:''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone No</th><td width="30px" class="text-center">:</td><td><?php echo e($history->guests?$history->guests->phone:''); ?></td>
                                    </tr>
                                    <?php if(!$history->instances): ?>
                                    <tr>
                                        <th>Start Date & Time</th><td width="30px" class="text-center">:</td><td><?php echo e($history->guests?date('Y-m-d h:mA',strtotime($history->guests->start_date_time)):''); ?></td>
                                    </tr>
                                    <tr>
                                        <th>End Date & Time</th><td width="30px" class="text-center">:</td><td><?php echo e($history->guests?date('Y-m-d h:mA',strtotime($history->guests->end_date_time)):''); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th>Guest Type</th><td width="30px" class="text-center">:</td><td><?php echo e(ucfirst($history->guests?$history->guests->type:'')); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<script>
    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");
        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        // Copy the text inside the ext field
        navigator.clipboard.writeText(copyText.value);
        // Alert the copied text
        document.querySelector('.copy').classList.add('d-none');
        document.querySelector('.check').classList.remove('d-none');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/scan/show.blade.php ENDPATH**/ ?>