@extends('administrative.layouts.auth-master')

@section('content')
<div class="card border-0">
   <div class="edit-profile__logos mt-3 mb-0">
      <a href="/">
         <img class="dark" height="50" src="{{asset('assets/img/logo.png')}}" alt="Logo">
         <img class="light" height="50" src="{{asset('assets/img/logo.png')}}" alt="Logo">
      </a>
   </div>
   <div class="card-header">
      <div class="edit-profile__title">
         <h6>Sign in KYRO Admin</h6>
      </div>
   </div>
   <div class="card-body">
      <form method="post" action="{{ route('login.post') }}">
         @csrf
         @if($errors->any())
         <p style="color: #e60980; font-weight: bold; text-align: center;"> {{$errors->first()}} </p>
         @endif

         <div class="edit-profile__body">
            <div class="form-group mb-25">
               <label for="employee_id">Email Address</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="form-group mb-15">
               <label for="password">password</label>
               <div class="position-relative">
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                  <div data-id="0" id="show-password" class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                  </div>
               </div>
            </div>
            <div class="admin-condition">
               <div class="checkbox-theme-default custom-checkbox ">
                  <input class="checkbox" type="checkbox" id="check-1">
                  <label for="check-1">
                     <span class="checkbox-text">Keep me logged in</span>
                  </label>
               </div>
               <!-- <a href="forget-password.html">forget password?</a> -->
            </div>
            <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
               <button type="submit" class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                  sign in
               </button>
            </div>
         </div>
      </form>
   </div>
   <!-- <div class="px-20">
       <p class="social-connector social-connector__admin text-center">
          <span>Or</span>
       </p>
       <div class="button-group d-flex align-items-center justify-content-center">
          <ul class="admin-socialBtn">
             <li>
                <button class="btn text-dark google">
                   <img class="svg" src="{{ asset('assets/img/google-Icon.svg') }}" alt="img" />
                </button>
             </li>
             <li>
                <button class=" radius-md wh-48 content-center facebook">
                   <i class="uil uil-facebook-f"></i>
                </button>
             </li>
             <li>
                <button class="radius-md wh-48 content-center twitter">
                   <i class="uil uil-twitter"></i>
                </button>
             </li>
             <li>
                <button class="radius-md wh-48 content-center github">
                   <i class="uil uil-github"></i>
                </button>
             </li>
          </ul>
       </div>
    </div>
    <div class="admin-topbar">
       <p class="mb-0">
          Don't have an account?
          <a href="sign-up.html" class="color-primary">
             Sign up
          </a>
       </p>
    </div> -->
</div>
@endsection
@section('page-js')
<script>
   $("#show-password").click(function() {
      var status = $(this).attr('data-id');
      if (status == 0) {
         $('#password').attr('type', 'text');
         var status = $(this).attr('data-id', 1);
      }
      if (status == 1) {
         $('#password').attr('type', 'password');
         var status = $(this).attr('data-id', 0);
      }
   });
</script>
@endsection
