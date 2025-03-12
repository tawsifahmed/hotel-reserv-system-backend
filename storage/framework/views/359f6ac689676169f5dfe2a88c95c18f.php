<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Invoice List</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_create')): ?>
                        <a href="<?php echo e(route('administrative.invoice.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-add-line"></i>
                            Create Invoice
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Invoice no</th>
                            <th>Date</th>
                            <th>Member</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Created By</th>
                            <th>Status</th>

                            <th>Invoice</th>
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
            $(function() {
                var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "<?php echo e(route('administrative.invoice.data')); ?>",

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
                            data: 'invoice',
                            name: 'invoice'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ],
                });
            });
        });



        function deleteData(rowid) {
            let url = '<?php echo e(route('administrative.invoice.delete', ':id')); ?>';
            url = url.replace(':id', rowid);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    axios.delete(url).then(res => {
                        if (res.data == 'success') {
                            Swal.fire({
                                title: "Good job!",
                                text: "Delete Successfully.",
                                icon: "success",
                                timer: 2000,
                            });
                            $('#datatable').DataTable().ajax.reload(null, false);
                        }
                    });
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/invoice/index.blade.php ENDPATH**/ ?>