@extends('layouts.app')
@section('content')
<main>
@if(isset($banner))
  <div class="baner-section" style="background-image: url(/public/images/banner/{{$banner->image}});">
  @if($banner->heading)
    <div class="baner-content">
      <h1 class="text-white m-t-b-40 fs-60 lh-1-0">{{$banner->heading}}</h1>
      <p class="m-b-0 fs-16">{{$banner->sub_heading}}</p>
      @if($banner->button_text)
    <div class="links"> 
      <a href="{{$banner->button_link}}" class="btns slider-btn"><span>{{$banner->button_text}}</span></a> 
    </div>
    @endif
    </div>
   @endif        
  </div>
@endif 
<section class="login-section">
<div class="windows-firm-Box">
    <div class="top-tile">
        Log In
    </div>
    <div class="windows-form">
        <a href="#" class="btn btn-style btn-lg btn-block">
          <strong>Login With Google</strong>
        </a>
        <div class="or-seperator"><i>or</i></div> 
        <form method="POST" action="{{ route('login') }}">
         @csrf
         <label class="dis-none" for="user-email">Email</label>
          <input type="email" placeholder="Email" class="windows-form-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="user-email" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            <label class="dis-none" for="password-field">Password</label>
            <input id="password-field" type="password" placeholder="Password" class="windows-form-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
            <p style="margin-left:25px"><input class="windows-form-input form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width:40px; height:20px;"><label for="remember" style="padding-left: 20px;">Remember Me</label>
                <span class="pull-right">
                    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="forget-password-text">{{ __('Forgotten Password?') }}</a>@endif
    </span>
            </p>
            <button type="submit" class="btn btn-style btn-top" >Submit</button>
            <br>
            <div style="float: left;color: #fff;">Don't have account ? <a href="/register" class="sign-up-link">Register here</a></div>
        </form>
    </div>
</div>
</section>
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
