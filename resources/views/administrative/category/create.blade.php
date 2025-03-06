@extends('administrative.layouts.master')
@section('page-css')
@endsection
@section('content')
<div class="mt-2">
    <ul class="dm-breadcrumb nav">
        <li class="dm-breadcrumb__item">
            <a href="#">
                Home
            </a>
            <span class="slash">/</span>
        </li>
        <li class="dm-breadcrumb__item">
            <a href="{{ route('administrative.guest.user') }}">Guest</a>
            <span class="slash">/</span>
        </li>
        <li class="dm-breadcrumb__item">
            <span>Create</span>
        </li>
    </ul>
</div>
<div class="message-wrapper"></div>
<div class="mt-4"></div>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
    <div>
        <h4 class="mb-3 mb-md-0">Guest Create</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('administrative.guest.user') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
            <i class="uil uil-align-alt" data-feather="server"></i>
            List
        </a>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-md-8 grid-margin stretch-card">

        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>Guest Create</h6>
            </div>
            <div class="card-body pb-md-30">
                <div class="Vertical-form">
                    <form class="forms-sample" action="{{ route('administrative.guest.user.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label for="name">Full Name</label>
                            <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
                            @if ($errors->has('name'))
                            <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                                name</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('organisation') ? 'has-danger' : '' }}">
                            <label for="organisation">Organisation Name</label>
                            <input required type="text" class="form-control form-control-danger" id="organisation" name="organisation" autocomplete="off" placeholder="Organisation name" value="{{ old('organisation', isset($data) ? $data->organisation : '') }}" aria-invalid="true">
                            @if ($errors->has('organisation'))
                            <label id="organisation-error" class="error mt-2 text-danger" for="organisation">Please enter
                                a organisation name</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control form-control-danger" id="phone" name="phone" autocomplete="off" placeholder="Phone number" value="{{ old('organisation', isset($data) ? $data->phone : '') }}" aria-invalid="true">
                            @if ($errors->has('phone'))
                            <label id="phone-error" class="error mt-2 text-danger" for="phone">Please enter
                                a phone</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control form-control-danger" id="email" name="email" autocomplete="off" placeholder="Email Address" value="{{ old('email', isset($data) ? $data->email : '') }}" aria-invalid="true">
                            @if ($errors->has('email'))
                            <label id="email-error" class="error mt-2 text-danger" for="email">Please enter
                                a email address</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="type">Select Guest Type</label>
                            <div class="radio-horizontal-list d-flex mb-0">
                                <div class="radio-theme-default custom-radio ">
                                    <input {{ old('type')=='instance'?'checked':'' }} class="radio" type="radio" name="type" value="instance" id="radio-vl1">
                                    <label for="radio-vl1">
                                        <span class="radio-text">Instance</span>
                                    </label>
                                </div>
                                <div class="radio-theme-default custom-radio ">
                                    <input {{ old('type')=='others'?'checked':'' }} class="radio" type="radio" name="type" value="others" id="radio-vl2">
                                    <label for="radio-vl2">
                                        <span class="radio-text">Others</span>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('type'))
                            <label id="type-error" class="error text-danger" for="role">Please select a
                                type</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('instance_id') ? 'has-error' : '' }} d-none" id="instance">
                            <label for="status">Select Instance</label>
                            <select name="instance_id" id="instance_id" class="form-control">
                                <option value="">Select Instance</option>
                                @foreach ($instances as $instance)
                                <option value="{{$instance->id}}">{{$instance->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('instance_id'))
                            <label id="instance_id-error" class="error mt-2 text-danger" for="role">Please select a
                                instance</label>
                            @endif
                        </div>
                        <div id="others" class="d-none">
                            <div class="form-group {{ $errors->has('start_date_time') ? 'has-danger' : '' }}">
                                <label for="start_date_time">Start Date & Time</label>
                                <input type="datetime-local" class="form-control form-control-danger" id="start_date_time" name="start_date_time" autocomplete="off" value="{{ old('start_date_time', isset($data) ? $data->start_date_time : '') }}" aria-invalid="true">
                                @if ($errors->has('start_date_time'))
                                <label id="start_date_time-error" class="error mt-2 text-danger" for="start_date_time">Please enter
                                    a start date time</label>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('end_date_time') ? 'has-danger' : '' }}">
                                <label for="end_date_time">End Date & Time</label>
                                <input type="datetime-local" class="form-control form-control-danger" id="end_date_time" name="end_date_time" autocomplete="off" value="{{ old('end_date_time', isset($data) ? $data->end_date_time : '') }}" aria-invalid="true">
                                @if ($errors->has('end_date_time'))
                                <label id="end_date_time-error" class="error mt-2 text-danger" for="end_date_time">Please enter a
                                    end date time</label>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('scan_limitation') ? 'has-danger' : '' }}">
                                <label for="scan_limitation">Number of Scan Limitations</label>
                                <input min="1" type="number" class="form-control form-control-danger"
                                    id="scan_limitation" name="scan_limitation" autocomplete="off"
                                    placeholder="Scan Limitations"
                                    value="{{ old('scan_limitation', isset($data) ? $data->scan_limitation : '') }}"
                                    aria-invalid="true">
                                @if ($errors->has('scan_limitation'))
                                    <label id="scan_limitation-error" class="error mt-2 text-danger"
                                        for="scan_limitation">Please enter a scan limitations</label>
                                @endif
                            </div>
                        </div>

                        <div class="layout-button mt-25">
                            <button type="submit" class="btn btn-primary px-20">
                                Submit
                            </button>
                            <button type="button" class="btn btn-default btn-squared btn-light px-20 ">
                                <a href="{{ route('administrative.guest.user') }}">cancel</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script>
    $(document).ready(function() {
        var selectedValue = $('input[name="type"]:checked').val();
        select(selectedValue)
        $('#radio-vl1, #radio-vl2').on('change', function() {
            var selectedValue = $('input[name="type"]:checked').val();
            select(selectedValue)
        });
        function select(selectedValue){
            if (selectedValue == 'instance') {
                $('#instance').removeClass('d-none');
                $('#others').addClass('d-none');
            } else if (selectedValue == 'others') {
                $('#instance').addClass('d-none');
                $('#others').removeClass('d-none');
            } else {
                $('#instance').addClass('d-none');
                $('#others').addClass('d-none');
            }
        }
    });
</script>
@endsection
