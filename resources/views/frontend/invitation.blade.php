<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Singularity Ltd">
  <title>Guest Management </title>
  <!-- Style CSS -->
  <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/demo.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
</head>

<body>
  <header class="cd__intro"> </header>
  <main class="cd__main">
    <div class="profile-page">
      <div class="content">
        <div class="content__actions">
            <img class="logo" src="{{asset('frontend/invitation.png')}}" alt="invitation">
        </div>
        <div class="content__title">
          <h1>{{$instance_name}}</h1>
          <h2>{{date('d',strtotime($start_date_time))}}<span> | {{date('M',strtotime($start_date_time))}} | </span>{{date('Y',strtotime($start_date_time))}}  /  <small>{{date('h:mA',strtotime($start_date_time))}}</small> -  {{date('d',strtotime($end_date_time))}}<span> |  {{date('M',strtotime($end_date_time))}} | </span> {{date('Y',strtotime($end_date_time))}}  /  <small> {{date('h:mA',strtotime($end_date_time))}}</small></h2>
          <span>{{$instance_location}}</span>
        </div>
        <div class="content__description">
          <h3><span>Guest</span> Information</h3>
          <h4><strong>{{$guest->name}}</strong></h4>
            <p>{{$guest->organisation}}</p>
            <p>{{$guest->email}}</p>
            <p>{{$guest->phone}}</p>
        </div>
        <div class="content__button">
            <div class="my-3">
                {!! QrCode::size(200)->color(74, 35, 90)->generate($qr) !!}
            </div>
          <p>This invitation is valid for <strong> {{$scan_validity>0?$scan_validity:0}} </strong> times</p>
        </div>

      </div>
      <div class="bg">
        <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
      </div>
      <div class="theme-switcher-wrapper" id="theme-switcher-wrapper"><span>Themes color</span>
        <ul>
          <li><em class="is-active" data-theme="orange"></em></li>
          <li><em data-theme="green"></em></li>
          <li><em data-theme="purple"></em></li>
          <li><em data-theme="blue"></em></li>
        </ul>
      </div>
      <div class="theme-switcher-button" id="theme-switcher-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
          <path fill="currentColor"
            d="M352 0H32C14.33 0 0 14.33 0 32v224h384V32c0-17.67-14.33-32-32-32zM0 320c0 35.35 28.66 64 64 64h64v64c0 35.35 28.66 64 64 64s64-28.65 64-64v-64h64c35.34 0 64-28.65 64-64v-32H0v32zm192 104c13.25 0 24 10.74 24 24 0 13.25-10.75 24-24 24s-24-10.75-24-24c0-13.26 10.75-24 24-24z">
          </path>
        </svg>
      </div>
    </div>
  </main>
  <footer class="cd__credit">&copy;Copyright By: <a href="" target="_blank">Singularity Ltd.</a></footer>
  <script src="{{asset('frontend/js/script.js')}}"></script>
</body>

</html>
