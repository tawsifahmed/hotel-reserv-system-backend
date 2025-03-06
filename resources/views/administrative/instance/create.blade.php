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
                <a href="{{ route('administrative.instance') }}">Instance</a>
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
            <h4 class="mb-3 mb-md-0">Instance Create</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('administrative.instance') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
                <i class="uil uil-align-alt" data-feather="server"></i>
                List
            </a>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">

            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-header">
                    <h6>Instance Create</h6>
                </div>
                <div class="card-body pb-md-30">
                    <div class="Vertical-form">
                        <form class="forms-sample" action="{{ route('administrative.instance.store') }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">Name</label>
                                <input required type="text" class="form-control form-control-danger" id="name"
                                    name="name" autocomplete="off" placeholder="Name"
                                    value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
                                @if ($errors->has('name'))
                                    <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                                        name</label>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="description">Description</label>
                                <input required type="text" class="form-control form-control-danger" id="description"
                                    name="description" autocomplete="off" placeholder="Description"
                                    value="{{ old('description', isset($data) ? $data->description : '') }}"
                                    aria-invalid="true">
                                @if ($errors->has('description'))
                                    <label id="description-error" class="error mt-2 text-danger" for="description">Please
                                        enter a Description</label>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('startDate') ? 'has-danger' : '' }}">
                                <label for="startDate">Start Date & Time</label>
                                <input required type="datetime-local" class="form-control form-control-danger" id="startDate"
                                    name="startDate" autocomplete="off"
                                    value="{{ old('startDate', isset($data) ? $data->startDate : '') }}"
                                    aria-invalid="true">
                                @if ($errors->has('startDate'))
                                    <label id="startDate-error" class="error mt-2 text-danger" for="startDate">Please enter
                                        a date</label>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('endDate') ? 'has-danger' : '' }}">
                                <label for="endDate">End Date & Time</label>
                                <input required type="datetime-local" class="form-control form-control-danger" id="endDate"
                                    name="endDate" autocomplete="off"
                                    value="{{ old('endDate', isset($data) ? $data->endDate : '') }}" aria-invalid="true">
                                @if ($errors->has('endDate'))
                                    <label id="endDate-error" class="error mt-2 text-danger" for="endDate">Please enter a
                                        date</label>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('attachment') ? 'has-danger' : '' }}">
                                <label for="attachment">Attachments</label>
                                <input type="file" class="form-control form-control-danger" id="attachment"
                                    name="attachment" autocomplete="off"
                                    value="{{ old('attachment', isset($data) ? $data->attachment : '') }}"
                                    aria-invalid="true">
                                @if ($errors->has('attachment'))
                                    <label id="attachment-error" class="error mt-2 text-danger" for="attachment">Please
                                        choose a file</label>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('location') ? 'has-danger' : '' }}">
                                <label for="location">Location</label>
                                <input required type="text" class="form-control form-control-danger" id="location"
                                    name="location" autocomplete="off" placeholder="Location"
                                    value="{{ old('location', isset($data) ? $data->location : '') }}"
                                    aria-invalid="true">
                                @if ($errors->has('location'))
                                    <label id="location-error" class="error mt-2 text-danger" for="location">Please enter
                                        a location</label>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('scanLimitations') ? 'has-danger' : '' }}">
                                <label for="scanLimitations">Number of Scan Limitations</label>
                                <input required min="1" type="number" class="form-control form-control-danger"
                                    id="scanLimitations" name="scanLimitations" autocomplete="off"
                                    placeholder="Scan Limitations"
                                    value="{{ old('scanLimitations', isset($data) ? $data->scanLimitations : '') }}"
                                    aria-invalid="true">
                                @if ($errors->has('scanLimitations'))
                                    <label id="scanLimitations-error" class="error mt-2 text-danger"
                                        for="scanLimitations">Please enter a scan limitations</label>
                                @endif
                            </div>

                            <div class="layout-button mt-25">
                                <button type="submit" class="btn btn-primary px-20">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-default btn-squared btn-light px-20 ">
                                    <a href="{{ route('administrative.instance') }}">cancel</a>
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
@endsection
