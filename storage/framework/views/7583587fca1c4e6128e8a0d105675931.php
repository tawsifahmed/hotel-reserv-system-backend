<?php $__env->startSection('page-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Details for <?php echo e($user->name); ?> </h4>
                </div>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card cursor-pinter click-card" data-card_type="all"  data-card_title="All Invoice">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2">All Invoice</p>
                                        <h4 class="mb-0"><?php echo e($total_count); ?></h4>
                                    </div>
                                    <div class="text-primary ms-auto">
                                        <i class="ri-file-paper-2-line  font-size-35"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <div class="text-truncate d-flex justify-content-between">
                                    <span class="text-primary ms-2">BDT <?php echo e($total_amount); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card cursor-pinter click-card" data-card_type="2" data-card_title="Paid Invoice">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2">Paid Invoice</p>
                                        <h4 class="mb-0"> <?php echo e($paid_count); ?></h4>
                                    </div>
                                    <div class="text-success ms-auto">
                                        <i class="ri-article-line  font-size-35"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <div class="text-truncate">
                                    <span class="text-success ms-2">BDT <?php echo e($paid_amount); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card cursor-pinter click-card" data-card_type="1"  data-card_title="Partial Payment">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2">Partial Payment</p>
                                        <h4 class="mb-0"><?php echo e($partial_count); ?></h4>
                                    </div>
                                    <div class="text-info ms-auto">
                                        <i class="ri-file-copy-2-line font-size-35"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <div class="text-truncate">
                                    <span class="text-info ms-2">BDT <?php echo e($partial_amount); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card cursor-pinter click-card" data-card_type="0" data-card_title="Due Invoice">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2">Due Invoice</p>
                                        <h4 class="mb-0"> <?php echo e($unpaid_count); ?></h4>
                                    </div>
                                    <div class="text-warning ms-auto">
                                        <i class="ri-newspaper-line font-size-35"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <div class="text-truncate">
                                    <span class="text-warning ms-2">BDT <?php echo e($unpaid_amount); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-title invoice-type-title">
                    All Invoice
                </p>
                <hr>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Invoice no</th>
                            <th>Date</th>
                            <th>Member</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Invoice Type</th>
                            <th>Download</th>
                            <th class="disabled-sorting text-left">Action</th>
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
                url: "<?php echo e(route('administrative.member.details-data')); ?>",
                data: function (d) {
                    d.user_id = "<?php echo e($user->id); ?>";
                    d.type = $('.active-card').attr('data-card_type') ?? 'all';
                }
            },

            columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'invoice_no',
                            name: 'invoice_no'
                        },
                        {
                            data: 'datetime',
                            name: 'datetime'
                        },
                        {
                            data: 'user',
                            name: 'user'
                        },
                        {
                            data: 'total_qty',
                            name: 'total_qty'
                        },
                        {
                            data: 'invoice_total',
                            name: 'invoice_total'
                        },
                        {
                            data: 'payment',
                            name: 'payment'
                        },
                        {
                            data: 'created_by',
                            name: 'created_by'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },

                        {
                            data: 'invoice_type',
                            name: 'invoice_type'
                        },
                        {
                            data: 'invoice',
                            name: 'invoice'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
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

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/member/details.blade.php ENDPATH**/ ?>