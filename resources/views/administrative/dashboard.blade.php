@extends('administrative.layouts.master')
@section('content')
<div class="pt-3">
  <div class="d-flex justify-content-between align-items-center ">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Welcome</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
                <!-- Card 1  -->
                <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">
                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                        <div class="ap-po-details__titlebar">
                            <h4 class="mb-3">Total Instance</h4>
                            <h1>{{number_format($instance_count)}}</h1>
                        </div>
                        <div class="ap-po-details__icon-area color-primary">
                            <i class="uil uil-book-open"></i>
                        </div>
                    </div>
                </div>
                <!-- Card 1 End  -->
            </div>
            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
                <!-- Card 1  -->
                <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">
                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                        <div class="ap-po-details__titlebar">
                            <h4 class="mb-3">Total Guest</h4>
                            <h1>{{number_format($guest_count)}}</h1>
                        </div>
                        <div class="ap-po-details__icon-area color-info">
                            <i class="uil uil-users-alt"></i>
                        </div>
                    </div>
                </div>
                <!-- Card 1 End  -->
            </div>
            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
                <!-- Card 1  -->
                <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">
                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                        <div class="ap-po-details__titlebar">
                            <h4 class="mb-3">Total Attending</h4>
                            <h1>{{number_format($total_scan_count)}}</h1>
                        </div>
                        <div class="ap-po-details__icon-area color-success">
                            <i class="uil uil-credit-card-search"></i>
                        </div>
                    </div>
                </div>
                <!-- Card 1 End  -->
            </div>
            <div class="col-xxl-3 col-sm-6  col-ssm-12 mb-25">
                <!-- Card 1  -->
                <div class="ap-po-details ap-po-details--luodcy  overview-card-shape radius-xl d-flex justify-content-between">
                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between w-100">
                        <div class="ap-po-details__titlebar">
                            <h4 class="mb-3">Total Admin User</h4>
                            <h1>{{number_format($admin_count)}}</h1>
                        </div>
                        <div class="ap-po-details__icon-area color-primary">
                            <i class="uil uil-user"></i>
                        </div>
                    </div>
                </div>
                <!-- Card 1 End  -->
            </div>
            <div class="col-xxl-12 col-sm-12  col-ssm-12 mb-25">
                <!-- Chart  -->
                <div class="card border-0 cashflowChart2">
                    <div class="card-header border-0 px-25 pt-25 pb-15">
                        <div class="chartLine-po-details__overview-content w-100">
                            <div class=" chartLine-po-details__content d-flex flex-wrap justify-content-between">
                                <div class="chartLine-po-details__titlebar">
                                    <h1>Instance & Guest Statistics</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card-header -->
                    <div class="card-body pt-0 ">
                        <div class="cashflow-chart">
                            <ul class="legend-static mb-30 mt-1 d-flex justify-content-center">
                                <li class="custom-label">
                                    <span class="bg-primary"></span>Invitation Sent
                                </li>
                                <li class="custom-label">
                                    <span class="bg-secondary"></span>Guest Attending
                                </li>
                            </ul>
                            <div class="parentContainer">
                                <div>
                                    <canvas id="instanceChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card-body -->
                </div>
                <!-- Chart 1 End  -->
            </div>
        </div>
    </div>
  </div>

</div>

@endsection

@section('page-js')
<script>
    chartjsBarChart(
        "instanceChart",
        (data = {!! json_encode($data_one) !!}),
        (data = {!! json_encode($data_tow) !!}),
        labels = {!! json_encode($label) !!},
        145,
        "Invitation Sent",
        "Guest Attending"
    );
</script>
@endsection
