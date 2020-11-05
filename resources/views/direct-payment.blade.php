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

<div class="container" style="margin-top: 50px;">
	
    <section class="login-section">
        <div class="windows-firm-Box">
            <div class="top-tile">
                Pay Payment
            </div>
        <div class="windows-form">
            
            <form method="POST" action="/pay/payment">
                @csrf
              <input  name="name" placeholder="Name" class="form-control windows-form-input {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name') }}" required="required" type="text">
                  @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
              <input id="email" name="email" placeholder="Email" class="form-control windows-form-input{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('email') }}" required="required" type="text">
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
             <input type="number" class="form-control windows-form-input {{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{old('phone_no') }}" id="mobile" placeholder="Mobile Number">
                  @if ($errors->has('phone_no'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone_no') }}</strong>
                  </span>
                  @endif
            <input class="form-control windows-form-input {{ $errors->has('payment') ? ' is-invalid' : '' }}" type="number" name="payment" value="{{old('payment')}}" placeholder="Enter Payment">
				@if ($errors->has('payment'))
	                <span class="invalid-feedback" role="alert">
	                   <strong>{{ $errors->first('payment') }}</strong>
	                </span>
                 @endif
            
            <button type="submit" class="btn btn-style btn-top" >Pay Now</button>
        </form>
        
            </div>
        </div>
    </section>
    </div>
  </main>
@endsection