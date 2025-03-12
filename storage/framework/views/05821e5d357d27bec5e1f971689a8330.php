

<div class="row">
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Total Member</p>
                                <h4 class="mb-0"><?php echo e($total_users); ?></h4>
                            </div>
                            <div class="text-primary ms-auto">
                                <i class="mdi mdi-account font-size-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Approved Member</p>
                                <h4 class="mb-0"><?php echo e($approved_users); ?></h4>
                            </div>
                            <div class="text-success ms-auto">
                                <i class="mdi mdi-account-check font-size-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Pending Member</p>
                                <h4 class="mb-0"><?php echo e($pending_users); ?></h4>
                            </div>
                            <div class="text-warning ms-auto">
                                <i class="mdi mdi-account-alert-outline font-size-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Declined Member</p>
                                <h4 class="mb-0"><?php echo e($decline_users); ?></h4>
                            </div>
                            <div class="text-danger ms-auto">
                                <i class="mdi mdi-account-remove font-size-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start row -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Total Invoice</p>
                                <h4 class="mb-0"><?php echo e($total_count); ?></h4>
                            </div>
                            <div class="text-primary ms-auto">
                                <i class="ri-file-paper-2-line  font-size-35 "></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-body border-top py-3">
                        <div class="text-truncate">
                            <span class="badge badge-soft-info font-size-14 text-dark">
                                <i class="mdi mdi-aspect-ratio"> </i> <?php echo e(number_format($total_amount,2)); ?>

                            </span>
                            <span class="text-muted ms-2">Amount</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Paid Invoice</p>
                                <h4 class="mb-0"><?php echo e($paid_count); ?></h4>
                            </div>
                            <div class="text-success ms-auto">
                                <i class="ri-article-line  font-size-35"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="text-truncate">
                            <span class="badge badge-soft-success font-size-14 text-dark">
                                <i class="mdi mdi-aspect-ratio"> </i> <?php echo e(number_format($paid_amount,2)); ?>

                            </span>
                            <span class="text-muted ms-2">Amount</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Partial Invoice</p>
                                <h4 class="mb-0"><?php echo e($partial_count); ?></h4>
                            </div>
                            <div class="text-dark ms-auto">
                                <i class="mdi mdi-microsoft-onenote font-size-35"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="text-truncate">
                            <span class="badge badge-soft-dark font-size-14 text-dark">
                                <i class="mdi mdi-aspect-ratio"> </i> <?php echo e(number_format($partial_amount,2)); ?>

                            </span>
                            <span class="text-muted ms-2">Amount</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-1 overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Due Invoice</p>
                                <h4 class="mb-0"><?php echo e($unpaid_count); ?></h4>
                            </div>
                            <div class="text-warning ms-auto">
                                <i class="ri-newspaper-line font-size-35"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top py-3">
                        <div class="text-truncate">
                            <span class="badge badge-soft-warning font-size-14 text-dark">
                                <i class="mdi mdi-aspect-ratio"> </i> <?php echo e(number_format($unpaid_amount,2)); ?>

                            </span>
                            <span class="text-muted ms-2">Amount</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body border-top">
                <h4 class="card-title mb-4">Partial Invoice Analytics</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate">
                                <i class="mdi mdi-microsoft-onenote text-dark font-size-14 me-1"></i>Invoice :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0 me-2"><?php echo e(number_format($partial_amount,2)); ?></h5>
                                <div class="text-dark">
                                    <i class="mdi mdi-menu-up font-size-14"> </i>100 %
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate">
                                <i class="mdi mdi-microsoft-onenote text-success font-size-14 me-1"></i>Invoice Paid :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0 me-2"><?php echo e(number_format($partial_payment,2)); ?></h5>
                                <div class="text-success">
                                    <i class="mdi mdi-menu-up font-size-14"> </i><?php if($partial_payment): ?><?php echo e(round(($partial_payment/$partial_amount)*100),2); ?> <?php else: ?> <?php echo e('0'); ?> <?php endif; ?> %
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate">
                                <i class="mdi mdi-microsoft-onenote text-warning font-size-14 me-1"></i>Invoice Due :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0"><?php echo e(number_format($partial_due,2)); ?></h5>
                                <div class="text-warning">
                                    <i class="mdi mdi-menu-up font-size-14"> </i><?php if($partial_payment): ?><?php echo e(round(($partial_due/$partial_amount)*100),2); ?> <?php else: ?> <?php echo e('0'); ?> <?php endif; ?> %
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title mb-4">Analytics (Invoice VS Payment)</h4>
                <div>
                    
                    <div id="payment-line-column-chart" class="apex-charts" dir="ltr"></div>
                </div>
            </div>

            <div class="card-body border-top text-center">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate">
                                <i class="mdi mdi-circle text-primary font-size-10 me-1"></i> Total Invoices :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0 me-2"><?php echo e(number_format($invoice_line_chart_sum,2)); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate">
                                <i class="mdi mdi-circle text-success font-size-10 me-1"></i>  Total Payments :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0 me-2"><?php echo e(number_format($payment_line_chart_sum,2)); ?></h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                
                <h4 class="card-title mb-4">Invoice Analytics</h4>

                <div id="invoice-donut-chart" class="apex-charts"></div>

                <div class="row">
                    <div class="col-4">
                        <div class="text-center mt-4">
                            <p class="mb-2 text-truncate">
                                <i class="mdi mdi-circle text-primary font-size-10 me-1"></i>
                                Unpaid
                            </p>
                            <h5><?php echo e(number_format($donut_chart[0]??0)); ?> %</h5>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center mt-4">
                            <p class="mb-2 text-truncate">
                                <i class="mdi mdi-circle text-warning font-size-10 me-1"></i>
                                Partial
                            </p>
                            <h5><?php echo e(number_format($donut_chart[1]??0)); ?> %</h5>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center mt-4">
                            <p class="mb-2 text-truncate">
                                <i class="mdi mdi-circle text-success font-size-10 me-1"></i>
                                Paid
                            </p>
                            <h5><?php echo e(number_format($donut_chart[2]??0)); ?> %</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Members Invoice Analytics</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#Pending" role="tab" aria-selected="true">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Pending</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Partial" role="tab" aria-selected="false">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Partial </span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-0 text-muted">
                    <div class="tab-pane active" id="Pending" role="tabpanel" style="height: 368px;overflow: auto;">
                        <table class="table table-hover mb-0 table-centered table-nowrap">
                            <tbody>
                                <?php $__currentLoopData = $unpaid_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('administrative.invoice.show',base64_encode($list->id))); ?>"><?php echo e($list->invoice_no); ?></a>
                                        </td>
                                        <td><?php echo e($list->user?$list->user->name:''); ?></td>
                                        <td style="text-align: right;">
                                            <strong><?php echo e(number_format($list->invoice_total,2)); ?></strong>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="Partial" role="tabpanel"  style="height: 368px;overflow: auto;">
                        <table class="table table-hover mb-0 table-centered table-nowrap">
                            <tbody>
                                <?php $__currentLoopData = $partial_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('administrative.invoice.show',base64_encode($list->id))); ?>"><?php echo e($list->invoice_no); ?></a>
                                        </td>
                                        <td><?php echo e($list->user?$list->user->name:''); ?></td>
                                        <td style="text-align: right;">
                                            <strong><?php echo e(number_format($list->invoice_total,2)); ?></strong>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Instant Appointment</h4>
                <div class="text-center">
                    <h5 class="mb-3">Scan QR Code</h5>
                    <?php echo QrCode::size(200)->color(74, 35, 90)->generate(ENV('APP_URL').'/instant-appointment'); ?>

                </div>
                <div class="text-center pt-3">
                    <h5>OR</h5>
                </div>
                <div class="text-center pt-3">
                    <h5>Share this link</h5>
                    <a href="<?php echo e(ENV('APP_URL').'/instant-appointment'); ?>" target="_blank"><strong><?php echo e(ENV('APP_URL').'/instant-appointment'); ?></strong></a>
                </div>
            </div>
        </div><!--end card-->
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Instance & Guest Statistics</h4>
                <div id="column_chart" class="apex-charts" dir="ltr"></div>
            </div>
        </div><!--end card-->
    </div>
</div>

 <!-- apexcharts -->
 <script>
    options = {
        series: <?php echo e(json_encode($donut_chart)); ?>,
        chart: {
            height: 250,
            type: "donut"
        },
        labels: ["Unpaid ", "Partial ", "Paid "],
        plotOptions: {
            pie: {
                donut: {
                    size: "75%"
                }
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1
        },
        colors: ["#5664d2","#eeb902", "#1cbb8c"]
    };
    chart_donut = new ApexCharts(document.querySelector("#invoice-donut-chart"), options)
    chart_donut.render();

    var options_line = {
        series: [{
            name: "Payment",
            type: "column",
            data: <?php echo e(json_encode($payment_line_chart_data)); ?>

        }, {
            name: "Invoice",
            type: "line",
            data: <?php echo e(json_encode($invoice_line_chart_data)); ?>

        }],
        chart: {
            height: 280,
            type: "line",
            toolbar: {
                show: !1
            }
        },
        stroke: {
            width: [0, 3],
            curve: "smooth"
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "20%"
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1
        },
        colors: [ "#1cbb8c", "#5664d2"],
        labels: <?php echo json_encode($labels); ?>,
    }
    chart_line = new ApexCharts(document.querySelector("#payment-line-column-chart"), options_line);
    chart_line.render();

    column_options = {
        chart: {
            height: 350,
            type: "bar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "5%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            colors: ["transparent"]
        },
        series: [{
                name: "Invitation Sent",
                data: <?php echo e(json_encode($guest_data_one)); ?>

            },
            {
                name: "Guest Attending",
                data: <?php echo e(json_encode($guest_data_tow)); ?>

            }
        ],
        colors: ["#5664d2", "#1cbb8c"],
        xaxis: {
            categories: <?php echo json_encode($guest_label); ?>,
        },
        yaxis: {
            title: {
                text: ""
            }
        },
        grid: {
            borderColor: "#f1f1f1",
            padding: {
                bottom: 10
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(e) {
                    return e
                }
            }
        },
        legend: {
            offsetY: 7
        }
    };
    column_chart = new ApexCharts(document.querySelector("#column_chart"), column_options);
    column_chart.render();
 </script>

<?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/dashboard/dashboard-analytics.blade.php ENDPATH**/ ?>