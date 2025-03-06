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
            <a href="{{ route('administrative.role') }}">Role</a>
            <span class="slash">/</span>
        </li>
        <li class="dm-breadcrumb__item">
            <span>Edit</span>
        </li>
    </ul>
</div>
<div class="message-wrapper"></div>
<div class="mt-4"></div>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
    <div>
        <h4 class="mb-3 mb-md-0">Role Edit</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('administrative.role') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
            <i class="uil uil-align-alt" data-feather="server"></i>
            List
        </a>
    </div>
</div>

<div class="mt-4"></div>
<div class="row d-flex justify-content-center">
    <div class="col-md-8 grid-margin stretch-card">

        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>Role Edit</h6>
            </div>
            <div class="card-body pb-md-30">
                <div class="Vertical-form">
                <form class="forms-sample" action="{{route('administrative.role.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                    {!! method_field('PUT') !!}
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                        <label for="name">Name</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" value="{{ old('name', isset($data) ? $data->name : '') }}" aria-invalid="true">
                        @if($errors->has('name'))
                        <label id="name-error" class="error mt-2 text-danger" for="name">Role name already used</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
                        <label for="permission">
                            Permission</label>
                        <div class="d-flex">
                            <span class="btn btn-primary btn-xs select-all mb-2">Select All</span>
                            <span class="btn btn-primary btn-xs deselect-all ml-2 mb-2">Deselect All</span>
                        </div>
                        <select name="permission[]" id="permission" class="form-control select2" multiple="multiple">
                            @foreach($permissions as $id => $permissions)
                            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($data) && $data->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ ucfirst(str_replace("_"," ",$permissions)) }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('permission'))
                        <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a permssion</label>
                        @endif
                    </div>

                    <div class="layout-button mt-25">
                        <button type="submit" class="btn btn-primary px-20">
                            Submit
                        </button>
                        <button type="button" class="btn btn-default btn-squared btn-light px-20 ">
                            <a href="{{ route('administrative.role') }}">cancel</a>
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
        $('#permission').select2();
    });

    $('.select-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })
</script>
@endsection
