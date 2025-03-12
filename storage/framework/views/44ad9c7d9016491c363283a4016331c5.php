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
                    <h4 class="card-title">Invoice List</h4>
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
                            <th>Due</th>
                            <th>Status</th>
                            <th>Invoice</th>
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
                    ajax: "<?php echo e(route('user.payment.invoice.data')); ?>",

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
                            data: 'total_due',
                            name: 'total_due'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },

                        {
                            data: 'invoice',
                            name: 'invoice'
                        }
                    ],
                });
            });
        });



        // function deleteData(rowid) {
        //     let url = '<?php echo e(route('administrative.occupation-type.delete', ':id')); ?>';
        //     url = url.replace(':id', rowid);
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         /* Read more about isConfirmed, isDenied below */
        //         if (result.isConfirmed) {
        //             axios.delete(url).then(res => {
        //                 if (res.data == 'success') {
        //                     Swal.fire({
        //                         title: "Good job!",
        //                         text: "Delete Successfully.",
        //                         icon: "success",
        //                         timer: 2000,
        //                     });
        //                     $('#datatable').DataTable().ajax.reload(null, false);
        //                 }
        //             });
        //         }
        //     })
        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/invoice/index.blade.php ENDPATH**/ ?>