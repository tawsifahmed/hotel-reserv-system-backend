<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Guest List</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_guest')): ?>
                        <div class="d-flex align-items-center flex-wrap text-nowrap">
                            <a href="<?php echo e(route('administrative.guest.user.create')); ?>"
                                class="btn btn-sm btn-primary btn-icon-text mr-2">
                                <i class="ri-add-line"></i>
                                Add New
                            </a>&nbsp;&nbsp;
                            <a href="#" class="btn btn-sm ml-2 btn-info  import">
                                <i class="fas fa-file-import"></i>
                                Import XLS
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr class="table-header">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Guest Type</th>
                            <th>Scan Limite</th>
                            <th>Status</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_guest', 'update_guest', 'delete_guest'])): ?>
                                <th class="disabled-sorting text-left">Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!-- import modal start -->
<div class="modal fade bs-example-modal-md modal-import" tabindex="-1" role="dialog"
    aria-labelledby="courseLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="POST" class="form-horizontal" enctype="multipart/form-data" id="import_form"
                action="javascript:void(0)">
                <div class="modal-header">
                    <h6 class="modal-title">Import Excel</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-wrap">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <a href="<?php echo e(asset('import-file/sample.xlsx')); ?>" download
                                                class="text-primary"><i class="fas fa-download mr-2"></i>
                                                Download Sample Excel</a>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="file" class="col-sm-3 control-label mb-2">Excel File<span
                                                    class="text-danger"> * </span></label>
                                            <div class="col-sm-12">
                                                <input type="file" id="file" name="file"
                                                    class="form-control" />
                                                <span id="file_error" class="font-12 text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="edit_common_error" class="font-12 text-danger"></span>
                    <button type="submit" class="btn btn-primary btn-sm btn-submit">Upload</button>
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- import modal end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                },
                processing: true,
                serverSide: true,
                order: [ [0, 'desc'] ],
                ajax: "<?php echo e(route('administrative.guest.user.data')); ?>",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',

                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'organisation',
                        name: 'organisation'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'instance_id',
                        name: 'instance_id'
                    },
                    {
                        data: 'scan_limitation',
                        name: 'scan_limitation'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_guest', 'update_guest', 'delete_guest'])): ?>
                        {
                            data: 'action',
                            name: 'action'
                        },
                    <?php endif; ?>
                ]
            });
        });

        $('.import').click(function(e) {
            $(this).addClass('btn-loading');
            $('.modal-import').modal('show');
        });
        $('#import_form').submit(function(e) {
            e.preventDefault();
            $('.btn-submit').addClass('btn-loading');
            $('#file_error').html('');
            var form = $('#import_form');
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('administrative.guest.user.import')); ?>",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.success) {
                        $('.modal-import').modal('hide');
                        swal.fire({
                            icon: "success",
                            button: false,
                            timer: 1000,
                            text: data.success,
                        });
                        $('.btn-submit').removeClass('btn-loading');
                        $('#datatable').DataTable().ajax.reload(null, false);
                        return false;
                    } else {
                        $('.btn-submit').removeClass('btn-loading');
                        $('#file_error').html(data.error.file);
                    }
                },
                error: function(data) {
                    $('.btn-submit').removeClass('btn-loading');
                }
            });
        });

        $('.modal-import').on('shown.bs.modal', function(e) {
            $('#file').val('');
            $('.import').removeClass('btn-loading');
        });



        function deleteData(rowid) {
            let url = '<?php echo e(route('administrative.guest.user.destroy', ':id')); ?>';
            url = url.replace(':id', rowid);
            swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover your data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(url).then(res => {
                        if (res.data == 'success') {
                            swal.fire({
                                icon: "success",
                                button: false,
                                timer: 1000,
                                text: 'Successfully deleted',
                            });
                            $('#datatable').DataTable().ajax.reload(null, false);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swal.fire({
                        icon: 'error',
                        button: false,
                        text: 'Your data is safe!',
                        timer: 1000,
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/guest-user/index.blade.php ENDPATH**/ ?>