<?php $__env->startSection('content'); ?>
       <!-- start page title -->
       <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>
                <div class="page-title-right">
                    <div class="d-flex">
                        <div class="input-daterange input-group " id="datepicker6" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                            <input type="date" class="form-control form-control-sm" id="start" placeholder="Start Date" />
                            <input type="date" class="form-control form-control-sm" id="end" placeholder="End Date" />
                        </div>&nbsp;&nbsp;
                        <select class="form-select form-select-sm" id="month" style="width: 30%">
                            <option value="all" selected>All</option>
                            <option value="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">Mar</option>
                            <option value="4">Apr</option>
                            <option value="5">May</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Aug</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>&nbsp;&nbsp;
                        <select class="form-select form-select-sm" id="year" style="width: 30%">
                            <option value="all" selected>All</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                            <option value="2033">2033</option>
                            <option value="2034">2034</option>
                            <option value="2035">2035</option>
                        </select>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div id="dashboard-analytics"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
 <!-- apexcharts -->
 <script src="<?php echo e(asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
 <!-- ajax dashboard analytics -->
 <script>
    $('#year').on('change',function() {
        dashboard();
    })
    $('#month').on('change',function() {
        dashboard();
    })
    $('#start').on('change',function() {
        dashboard();
    })
    $('#end').on('change',function() {
        dashboard();
    })
    dashboard();
    function dashboard() {
        var year = $('#year option:selected').val();
        var month = $('#month option:selected').val();
        var start = $('#start').val();
        var end = $('#end').val();
        $.ajax({
            url: "<?php echo e(route('user.dashboard.data')); ?>",
            data: {
                'year':year,
                'month':month,
                'start_date':start,
                'end_date':end,
            },
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#dashboard-analytics').html(response);
            },
            error: function(error) {
                console.error('AJAX Error:', error);
            }
        });
    }
 </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/dashboard/dashboard.blade.php ENDPATH**/ ?>