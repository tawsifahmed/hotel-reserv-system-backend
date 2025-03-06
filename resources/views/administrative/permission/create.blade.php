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
            <a href="{{ route('administrative.permission') }}">Permission</a>
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
        <h4 class="mb-3 mb-md-0">Permission Create</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('administrative.permission') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
            <i class="uil uil-align-alt" data-feather="server"></i>
            List
        </a>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-md-8 grid-margin stretch-card">

        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>Permission Create</h6>
            </div>
            <div class="card-body pb-md-30">
                <div class="Vertical-form">
                    <form class="forms-sample" action="{{route('administrative.permission.store')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label for="name">Name</label>
                            <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
                            @if($errors->has('name'))
                            <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a name</label>
                            @endif
                        </div>

                        <div class="layout-button mt-25">
                            <button type="submit" class="btn btn-primary px-20">
                                Submit
                            </button>
                            <button type="button" class="btn btn-default btn-squared btn-light px-20 ">
                                <a href="{{ route('administrative.permission') }}">cancel</a>
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