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
            <a href="{{ route('administrative.user') }}">User</a>
            <span class="slash">/</span>
        </li>
        <li class="dm-breadcrumb__item">
            <span>Create</span>
        </li>
    </ul>
</div>
<div class="message-wrapper">

</div>
<div class="mt-4"></div>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
    <div>
        <h4 class="mb-3 mb-md-0">User Create</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('administrative.user') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
            <i class="uil uil-align-alt" data-feather="server"></i>
            User
        </a>
    </div>
</div>
<div class="mt-4"></div>
<div class="row d-flex justify-content-center">
    <div class="col-md-8 grid-margin stretch-card">

        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>User Create</h6>
            </div>
            <div class="card-body pb-md-30">
                <div class="Vertical-form">
                    <form class="forms-sample" action="{{ route('administrative.user.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('full_name') ? 'has-danger' : '' }}">
                            <label for="name">Full Name <span style="color:red">*</span></label>
                            <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Full Name" value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
                            @if ($errors->has('name'))
                            <label id="name-error" class="error mt-2 text-danger" for="name">{{ $errors->first('name') }}</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">Email <span style="color:red">*</span></label>
                            <input required type="email" class="form-control form-control-danger" id="email" name="email" autocomplete="off" placeholder="Email" value="{{ old('email', isset($data) ? $data->email : '') }}" aria-invalid="true">
                            @if ($errors->has('email'))
                            <label id="email-error" class="error mt-2 text-danger" for="email">{{ $errors->first('email') }}</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('designation') ? 'has-danger' : '' }}">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control form-control-danger" id="designation" name="designation" autocomplete="off" placeholder="Designation" value="{{ old('designation', isset($data) ? $data->designation : '') }}" aria-invalid="true">
                            @if ($errors->has('designation'))
                            <label id="designation-error" class="error mt-2 text-danger" for="designation">{{ $errors->first('designation') }}</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                            <label for="status">Select Role <span style="color:red">*</span></label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                            <label id="role-error" class="error mt-2 text-danger" for="role">Please select a
                                role</label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">Select Status <span style="color:red">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @if ($errors->has('status'))
                            <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a
                                Unit</label>
                            @endif
                        </div>


                        <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                            <label for="password">Password <span style="color:red">*</span></label>
                            <input required type="password" class="form-control form-control-danger" id="password" name="password" autocomplete="off" value="" aria-invalid="true" placeholder="Password">
                            @if ($errors->has('password'))
                            <label id="password-error" class="error mt-2 text-danger" for="password">{{ $errors->first('password') }}</label>
                            @endif
                        </div>

                        <div class="layout-button mt-25">
                            <button type="submit" class="btn btn-primary px-20">
                                save
                            </button>
                            <button type="button" class="btn btn-default btn-squared btn-light px-20 ">
                                <a href="{{ route('administrative.user') }}">cancel</a>
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
