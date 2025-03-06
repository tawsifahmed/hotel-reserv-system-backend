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
                <a href="{{ route('administrative.scan.list') }}">Scan Details</a>
                <span class="slash">/</span>
            </li>
            <li class="dm-breadcrumb__item">
                <span>Scan Details</span>
            </li>
        </ul>
    </div>
    <div class="message-wrapper"></div>
    <div class="mt-4"></div>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
        <div>
            <h4 class="mb-3 mb-md-0">Scan Details</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('administrative.scan.list') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
                <i class="uil uil-align-alt" data-feather="server"></i>
                Scan List
            </a>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body pb-md-30 mt-2 text-center">
                    <h4>Invitation QR CODE</h4>
                    <div class="my-3">
                    {!! QrCode::size(200)->color(74, 35, 90)->generate($history->qr) !!}
                    </div>
                    <h5 class="text-success mb-3">QR Code Already Scan {{$history->scan_count}} Times.</h5>
                    <small class="text-danger">{{$history->last_scan?'Last Scan: '.date('Y-m-d h:mA',strtotime($history->last_scan->created_at)):''}}</small>
                    <div class="form-group">
                        <label for="scan_limitation">Invitation Link</label>
                        <div class="d-flex">
                            <input readonly type="text" class="form-control form-control-danger" id="myInput" name="myInput" autocomplete="off" value="{{url($history->url)}}" aria-invalid="true">
                            <!-- The button used to copy the text -->
                            <a class="copy-button" onclick="myFunction()">
                                <i class="fas fa-copy copy"></i>
                                <i class="fas fa-check check d-none"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body pb-md-30 mt-2">
                    <h4>Instance Information</h4>
                    <table class="mt-3">
                        <tr>
                            <th>Name</th><td width="30px" class="text-center">:</td><td>{{$history->instances?$history->instances->name:'Office'}}</td>
                        </tr>
                        @if($history->instances)
                        <tr>
                            <th>Description</th><td width="30px" class="text-center">:</td><td>{{$history->instances->description}}</td>
                        </tr>
                        <tr>
                            <th>Start Date & Time</th><td width="30px" class="text-center">:</td><td>{{date('Y-m-d h:mA',strtotime($history->instances->start_date_time))}}</td>
                        </tr>
                        <tr>
                            <th>End Date & Time</th><td width="30px" class="text-center">:</td><td>{{date('Y-m-d h:mA',strtotime($history->instances->end_date_time))}}</td>
                        </tr>
                        @if($history->instances->attachment)
                        <tr>
                            <th>Attachments</th><td width="30px" class="text-center">:</td><td><a href="{{asset('storage/'.$history->instances->attachment)}}" download><u>Download Attachment</u></a></td>
                        </tr>
                        @endif
                        <tr>
                            <th>Location</th><td width="30px" class="text-center">:</td><td>{{$history->instances->location}}</td>
                        </tr>
                        <tr>
                            <th>Scan Limitations</th><td width="30px" class="text-center">:</td><td>{{$history->instances->scan_limitation}}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body pb-md-30 mt-2">
                    <h4>Guest Information</h4>
                    <table class="mt-3">
                        <tr>
                            <th>Name</th><td width="30px" class="text-center">:</td><td>{{$history->guests?$history->guests->name:''}}</td>
                        </tr>
                        <tr>
                            <th>Email</th><td width="30px" class="text-center">:</td><td>{{$history->guests?$history->guests->email:''}}</td>
                        </tr>
                        <tr>
                            <th>Phone No</th><td width="30px" class="text-center">:</td><td>{{$history->guests?$history->guests->phone:''}}</td>
                        </tr>
                        @if(!$history->instances)
                        <tr>
                            <th>Start Date & Time</th><td width="30px" class="text-center">:</td><td>{{$history->guests?date('Y-m-d h:mA',strtotime($history->guests->start_date_time)):''}}</td>
                        </tr>
                        <tr>
                            <th>End Date & Time</th><td width="30px" class="text-center">:</td><td>{{$history->guests?date('Y-m-d h:mA',strtotime($history->guests->end_date_time)):''}}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Guest Type</th><td width="30px" class="text-center">:</td><td>{{ucfirst($history->guests?$history->guests->type:'')}}</td>
                        </tr>
                    </table>
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
