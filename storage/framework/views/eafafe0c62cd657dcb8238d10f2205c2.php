

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
                                <p class="text-truncate font-size-14 mb-2">Decline Member</p>
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
                                    <i class="mdi mdi-menu-up font-size-14"> </i><?php echo e(round(($partial_payment/$partial_amount)*100),2); ?> %
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
                                    <i class="mdi mdi-menu-up font-size-14"> </i><?php echo e(round(($partial_due/$partial_amount)*100),2); ?> %
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
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 me-1"></i> This Year :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0 me-2">$ 34,254</h5>
                                <div class="text-success">
                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-primary font-size-10 me-1"></i> This Year :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0 me-2">$ 34,254</h5>
                                <div class="text-success">
                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <p class="mb-2 text-muted text-truncate"><i class="mdi mdi-circle text-success font-size-10 me-1"></i> Previous Year :</p>
                            <div class="d-inline-flex">
                                <h5 class="mb-0">$ 32,695</h5>
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
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="Pending" role="tabpanel">
                        <table class="table table-hover mb-0 table-centered table-nowrap">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 1</h5>
                                    </td>
                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2478</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 2</h5>
                                    </td>

                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2625</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 3</h5>
                                    </td>
                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2856</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 2</h5>
                                    </td>

                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2625</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 3</h5>
                                    </td>
                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2856</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="Partial" role="tabpanel">
                        <table class="table table-hover mb-0 table-centered table-nowrap">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 1</h5>
                                    </td>
                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2478</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 2</h5>
                                    </td>

                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2625</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 3</h5>
                                    </td>
                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2856</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 2</h5>
                                    </td>

                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2625</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-14 mb-0">Source 3</h5>
                                    </td>
                                    <td>mostafiz128@gmail.com</td>
                                    <td>
                                        <p class="text-muted mb-0">$ 2856</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


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
            name: "2020",
            type: "column",
            data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
        }, {
            name: "2019",
            type: "line",
            data: [23, 32, 27, 38, 27, 32, 27, 38, 22, 31, 21, 16]
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
        colors: ["#5664d2", "#1cbb8c"],
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    chart_line = new ApexCharts(document.querySelector("#payment-line-column-chart"), options_line);
    chart_line.render();
 </script>

<?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/dashboard-analytics.blade.php ENDPATH**/ ?>