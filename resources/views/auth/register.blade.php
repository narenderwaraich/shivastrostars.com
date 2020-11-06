@extends('layouts.app')
@section('content')
<main>
  <div class="baner-section" style="background-image: url(/public/images/banner/register-banner.jpg);">
    <div class="baner-content">
      <h1 class="text-white m-t-b-40 fs-60 lh-1-0"></h1>
      <p class="m-b-0 fs-16"></p>
<!--     <div class="links"> 
      <a href="" class="btns slider-btn"><span></span></a> 
    </div> -->
    </div>       
<div class="container singn-up">
<div class="windows-firm-Box">
    <div class="top-tile">
        Register
    </div>
    <div class="windows-form">
        <a href="{{ url('auth/google') }}" class="btn btn-style btn-lg btn-block">
          <strong>Register With Google</strong>
        </a>
        <div class="or-seperator"><i>or</i></div> 
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label class="dis-none" for="user-name">Name</label>
            <input type="text" class="windows-form-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="user-name" placeholder="Name" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <label class="dis-none" for="user-email">Email</label>
            <input id="user-email" type="email" class="windows-form-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label class="dis-none" for="phone">Phone</label>
            <input id="phone" type="number" class="windows-form-input form-control {{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" placeholder="Phone">
            @if ($errors->has('phone_no'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone_no') }}</strong>
                </span>
            @endif
<select name="gender" id="select" required class="windows-form-input form-control ">
                                            <option value="">-- Select Gender--</option>    
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                          </select>
                                   

            <label class="dis-none" for="password-field">Password</label>
            <input id="password-field" type="password" class="windows-form-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
            <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
 
        <button type="submit" class="btn btn-style btn-top" >Submit</button>
        <br>
        <div style="float: left;color: #fff;">Already have account ? <a href="/login" class="login-link">Log in</a>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</main>
<style>
.btn-style {
    text-transform: uppercase;
    background: transparent;
    color: #ff9e80;
    border: 2px solid #ff9e80;
    margin: auto;
    text-align: center;
    border-radius: 0px;
    padding: .6180469716em 1.41575em;
    font-size: 17px;
    font-family: 'Montserrat', sans-serif;
    display: block !important;
    width: auto !important;
    outline: none;
    font-weight: 400;
    margin-bottom: 30px;
    box-shadow: unset !important;
}
.btn-style:hover {
    color: #ffffff;
    background-color: #ff9e80;
    border: 2px solid #ff9e80;
}
.or-seperator {
    margin: 20px 0 10px;
    text-align: center;
    border-top: 2px solid #ff9e80;
}
.or-seperator i {
    padding: 0 10px;
    background: #ff9e80;
    color: #fff;
    position: relative;
    top: -11px;
    z-index: 1;
}
</style>
<script src="/public/jquery/jquery-3.2.1.min.js"></script>
<script>
$(".toggle-password").click(function() {
$(this).toggleClass("fa-eye-slash fa-eye");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
input.attr("type", "text");
} else {
input.attr("type", "password");
}
});
</script>
@endsection
