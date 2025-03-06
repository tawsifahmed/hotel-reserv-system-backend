@extends('administrative.layouts.master')
@section('page-css')
    <style>
        #reader {
            border-radius: 5px;
        }

        #reader__scan_region {
            min-height: 320px !important;
        }

        #reader__dashboard_section {
            display: flex;
            justify-content: space-between;
        }

        #reader__dashboard_section a {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            background: #f0f0f0;
            color: #000;
            text-decoration: none !important;
            display: block;
        }

        #reader__dashboard_section a:hover {
            background: #edd3fd;
        }

        #reader__dashboard_section_csr button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        #reader__dashboard_section_csr button:hover {
            background: #edd3fd;
        }

        .icon-size {
            height: 50px !important;
            width: 50px !important;
        }

        #reader__camera_selection {
            border: 1px solid #dddd;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
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
                <a href="{{ route('administrative.scan.list') }}">Scan List</a>
                <span class="slash">/</span>
            </li>
            <li class="dm-breadcrumb__item">
                <span>Scan Qr Code</span>
            </li>
        </ul>
    </div>
    <div class="message-wrapper"></div>
    <div class="mt-4"></div>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mt-2 mb-2 ">
        <div>
            <h4 class="mb-3 mb-md-0">Scan Qr Code</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('administrative.scan.list') }}" class="btn btn-primary btn-xs btn-icon-text mb-2 mb-md-0">
                <i class="uil uil-align-alt" data-feather="server"></i>
                Scan List
            </a>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 grid-margin stretch-card">

            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body pb-md-30 mt-2">
                    <div id="reader"></div>
                    <div class="mt-3">
                        <h5>SCAN RESULT</h5>
                        <div class="result">Result Here</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script src="{{ asset('assets/theme_assets/js/html5-qrcode.min.js') }}"></script>
    <script type="text/javascript">
        // after success to play camera Webcam Ajax paly to send data to Controller

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
        var lastResult, countResults = 0;
        function onScanSuccess(info) {
            if (info !== lastResult) {
                ++countResults;
                lastResult = info;
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "{{ route('administrative.scan.check') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: info
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            swal.fire({
                                icon: "success",
                                button: false,
                                timer: 3000,
                                text: data.message,
                            });

                            $('.result').html(
                                '<div class="alert-icon-area alert alert-success mt-3" role="alert">' +
                                '<div class="alert-icon">' +
                                '<img class="icon-size" src="{{ asset('assets/img/success.png') }}" alt="layers" class="svg">' +
                            '</div>' +
                            '<div class="alert-content">' +
                            ' <h6 class="alert-heading">' + data.message + '</h6>' +
                            '<p><strong>' + data.guest.name + '</strong></p> ' +
                            '<p>' + data.guest.organisation + '</p> ' +
                            '<p>' + data.guest.email + '</p> ' +
                            '<p>' + data.guest.phone + '</p> ' +
                            '</div> ' +
                            '</div>');
                        } else {
                            swal.fire({
                                icon: "error",
                                button: false,
                                timer: 3000,
                                text: data.message,
                            });
                            $('.result').html(
                                '<div class="alert-icon-area alert alert-warning mt-3" role="alert">' +
                                '<div class="alert-icon">' +
                                '<img class="icon-size" src="{{ asset('assets/img/failed.png') }}" alt="layers" class="svg">' +
                            '</div>' +
                            '<div class="alert-content">' +
                            '<p>' + data.message + '</p> ' +
                            '</div> ' +
                            '</div>');
                        }
                    }
                })
            }

        }
    </script>
@endsection
