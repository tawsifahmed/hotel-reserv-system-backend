<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Commission List</h4>
                </div>
                <p class="card-title-desc"></p>
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-3">
                        <div class="card cursor-pinter click-card" data-card_type="<?php echo e($restaurant->title); ?>"  data-card_title="<?php echo e($restaurant->title); ?> Restaurant">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2"><strong><?php echo e($restaurant->title); ?></strong> Restaurant </p>
                                        <h4 class="mb-0 "><small class="text-warning" style="font-size: 14px">BDT</small>&nbsp;<?php echo e(number_format($restaurant->commission_sum_commission_amount,2)); ?></h4>
                                    </div>
                                    <div class="ms-auto">
                                        <h1><i class="ri-restaurant-line text-warning"></i></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <div class="text-truncate d-flex justify-content-between">
                                   Running Commission <span class="text-info">(<?php echo e($restaurant->commission); ?>%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            Restaurant Settings not found!. Please Create  Restaurant Settings
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <p class="card-title invoice-type-title">
                    All Restaurant
                </p>
                <hr>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Resturent</th>
                            <th>Invoice no</th>
                            <th>Invoice Amount</th>
                            <th>Commission</th>
                            <th>Commission Amount</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script>
    $(document).ready(function() {
        var tables = $('#datatable').DataTable({
            "aLengthMenu": [
                [10, 30, 50, -1],
                [10, 30, 50, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
                search: "Search"
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo e(route('administrative.commission.details-data')); ?>",
                data: function (d) {
                    d.prefix = $('.active-card').attr('data-card_type') ?? 'all';
                }
            },

            columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'prefix',
                            name: 'prefix'
                        },
                        {
                            data: 'invoice_no',
                            name: 'invoice_no'
                        },
                        {
                            data: 'invoice_total',
                            name: 'invoice_total'
                        },
                        {
                            data: 'commission',
                            name: 'commission'
                        },
                        {
                            data: 'commission_amount',
                            name: 'commission_amount'
                        },
                        {
                            data: 'datetime',
                            name: 'datetime'
                        },
                    ],
        });
        $('.click-card').on('click',function(){
            $('.click-card').removeClass('active-card');
            $(this).addClass('active-card')
            var title = $(this).data('card_title');
            $('.invoice-type-title').text(title)
            tables.draw();
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/commission/index.blade.php ENDPATH**/ ?>