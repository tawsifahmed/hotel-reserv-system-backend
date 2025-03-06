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
            <span>Details</span>
        </li>
    </ul>
</div>
<div class="message-wrapper"></div>
<div class="mt-4"></div>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
    <div>
        <h4 class="mb-3 mb-md-0">Guest Details</h4>
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
                <h6>Guest Details</h6>
            </div>
            <div class="card-body pb-md-30">
                <div class="Vertical-form">
                    <form class="forms-sample" action="#" method="POST" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        @csrf

                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label for="name">Full Name</label>
                            <input readonly type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
                            @if ($errors->has('name'))
                            <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                                name</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('organisation') ? 'has-danger' : '' }}">
                            <label for="organisation">Organisation Name</label>
                            <input readonly type="text" class="form-control form-control-danger" id="organisation" name="organisation" autocomplete="off" placeholder="Organisation name" value="{{ old('organisation', isset($data) ? $data->organisation : '') }}" aria-invalid="true">
                            @if ($errors->has('organisation'))
                            <label id="organisation-error" class="error mt-2 text-danger" for="organisation">Please enter
                                a organisation name</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone">Phone number</label>
                            <input readonly type="text" class="form-control form-control-danger" id="phone" name="phone" autocomplete="off" placeholder="phone number" value="{{ old('organisation', isset($data) ? $data->phone : '') }}" aria-invalid="true">
                            @if ($errors->has('phone'))
                            <label id="phone-error" class="error mt-2 text-danger" for="phone">Please enter
                                a phone</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">Email Address</label>
                            <input readonly type="email" class="form-control form-control-danger" id="email" name="email" autocomplete="off" placeholder="Email Address" value="{{ old('email', isset($data) ? $data->email : '') }}" aria-invalid="true">
                            @if ($errors->has('email'))
                            <label id="email-error" class="error mt-2 text-danger" for="email">Please enter
                                a email address</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="type">Guest Type</label>
                            <input readonly type="email" class="form-control form-control-danger" id="type" name="type" autocomplete="off" placeholder="Type" value="{{ old('type', isset($data) ? ucfirst($data->type) : '') }}" aria-invalid="true">
                            @if ($errors->has('type'))
                            <label id="email-error" class="error mt-2 text-danger" for="email">Please enter
                                a type</label>
                            @endif
                        </div>
                        @if(!empty($data->instance_id))
                        <div class="form-group {{ $errors->has('instance_id') ? 'has-error' : '' }}">
                            <label for="instance_id">Select Instance</label>
                            <input readonly type="text" class="form-control form-control-danger" id="instance_id" name="instance_id" autocomplete="off" value="{{ old('instance_id', isset($data) ? $instances->instance_id : '') }}" aria-invalid="true">

                            @if ($errors->has('instance_id'))
                            <label id="instance_id-error" class="error mt-2 text-danger" for="role">Please select a
                                instance</label>
                            @endif
                        </div>
                        @endif
                        @if(!empty($data->start_date_time) || !empty($data->end_date_time))
                        <div class="form-group {{ $errors->has('start_date_time') ? 'has-danger' : '' }}">
                            <label for="start_date_time">Start Date & Time</label>
                            <input readonly type="datetime-local" class="form-control form-control-danger" id="start_date_time" name="start_date_time" autocomplete="off" value="{{ old('start_date_time', isset($data) ? $data->start_date_time : '') }}" aria-invalid="true">
                            @if ($errors->has('start_date_time'))
                            <label id="start_date_time-error" class="error mt-2 text-danger" for="start_date_time">Please enter
                                a date</label>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('end_date_time') ? 'has-danger' : '' }}">
                            <label for="end_date_time">End Date & Time</label>
                            <input readonly type="datetime-local" class="form-control form-control-danger" id="end_date_time" name="end_date_time" autocomplete="off" value="{{ old('end_date_time', isset($data) ? $data->end_date_time : '') }}" aria-invalid="true">
                            @if ($errors->has('end_date_time'))
                            <label id="end_date_time-error" class="error mt-2 text-danger" for="end_date_time">Please enter a
                                date</label>
                            @endif
                        </div>
                        @endif
                        @if(!empty($data->scan_limitation))
                        <div class="form-group {{ $errors->has('scan_limitation') ? 'has-danger' : '' }}">
                            <label for="scan_limitation">Number of Scan Limitations</label>
                            <input readonly min="1" type="number" class="form-control form-control-danger"
                                   id="scan_limitation" name="scan_limitation" autocomplete="off"
                                   placeholder="Scan Limitations"
                                   value="{{ old('scan_limitation', isset($data) ? $data->scan_limitation : '') }}"
                                   aria-invalid="true">
                            @if ($errors->has('scan_limitation'))
                            <label id="scan_limitation-error" class="error mt-2 text-danger"
                                   for="scan_limitation">Please enter a scan limitations</label>
                            @endif
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="scan_limitation">Invitation Link</label>
                            <div class="d-flex">
                                <input readonly type="text" class="form-control form-control-danger" id="myInput" name="myInput" autocomplete="off" value="{{url($url)}}" aria-invalid="true">
                                <!-- The button used to copy the text -->
                                <a class="copy-button" onclick="myFunction()">
                                    <i class="fas fa-copy copy"></i>
                                    <i class="fas fa-check check d-none"></i>
                                </a>
                            </div>

                        </div
                        <div class="form-group">
                            <label for="scan_limitation">Invitation QR Code</label>
                            <div class="content__button">
                                <div class="my-3">
                                    {!! QrCode::size(150)->color(74, 35, 90)->generate($qr) !!}
                                </div>
                            </div>

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
    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");
        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        // Copy the text inside the ext field
        navigator.clipboard.writeText(copyText.value);
        // Alert the copied text
        document.querySelector('.copy').classList.add('d-none');
        document.querySelector('.check').classList.remove('d-none');
    }
</script>
@endsection
