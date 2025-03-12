<?php $__env->startSection('page-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Member List</h4>
                    <div class="form-group input-sm">
                        
                            <select id="status_change" name="status_change" class="form-select form-select-sm" required>
                                <option value="all">All</option>
                                <option value="0">Pending</option>
                                <option value="1" selected>Approve</option>
                                <option value="2">Decline</option>
                            </select>
                        
                    </div>
                </div>
                <p class="card-title-desc"></p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Membership No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Membership Type</th>
                            <th>Proposed By</th>
                            <th>Seconded By</th>
                            <th>Details</th>
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
        var tables = $('.datatable').DataTable({
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
                url: "<?php echo e(route('administrative.member.data')); ?>",
                data: function (d) {
                    d.approval = $('#status_change option:selected').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                { data: 'thumbnail', name: 'thumbnail',
                    render: function( data, type, full, meta ) {
                        return "<img src="+ data +" height=\"30\" width=\"30\"/>";
                    }
                },
                {
                    data: 'membership_no',
                    name: 'membership_no'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'type_of_member',
                    name: 'type_of_member'
                },
                {
                    data: 'proposed_by_approved',
                    name: 'proposed_by_approved'
                },
                {
                    data: 'second_by_approved',
                    name: 'second_by_approved'
                },
                {
                    data: 'details',
                    name: 'details'
                }
            ]
        });
        $('#status_change').on('change', function(){
            tables.draw();
        })
    });


    function deleteData(rowid) {
        let url = '<?php echo e(route("administrative.user.destroy", ":id")); ?>';
        url = url.replace(':id', rowid);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#1cbb8c",
            cancelButtonColor: "#ff3d60",
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
                        })
                        $('#datatable').DataTable().ajax.reload(null, false);
                    }
                });
            }
        })
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/member/index.blade.php ENDPATH**/ ?>