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
<section class="section-top-padding contact-us-section container">
          <div class="heading-title contact-heading" style="text-align: center;">Get In Touch</div>
          <p class="contact-sub-heading">We would be happy to help you. You can contact us ..</p>

              <section class="login-section">
        <div class="windows-firm-Box" style="margin-top: 50px;">
            <div class="top-tile">
                Contact Us
            </div>
        <div class="windows-form">
            
            <form method="POST" action="/contact-us">
                @csrf
            <div class="form-group">
              <label class="dis-none" for="full-name">Name</label>
              <input class="form-control windows-form-input" type="text" name="name" value="" placeholder="Name" id="full-name">
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                  </span>
                 @endif
            </div>
            <div class="form-group">
              <label class="dis-none" for="mob-no">Mobile</label>
              <input class="form-control windows-form-input" type="number" name="phone_number" value="" placeholder="Mobile" id="mob-no">
              @if ($errors->has('phone_number'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('phone_number') }}</strong>
                  </span>
                 @endif
            </div>
             <div class="form-group">
              <label class="dis-none" for="email-address">Email</label>
              <input class="form-control windows-form-input" type="text" name="email" value="" placeholder="Email" id="email-address">
              @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
             </div>
            
           <div class="form-group">
            <label class="dis-none" for="query">Message</label>
            <textarea class="form-control windows-form-input" name="message" placeholder="Message" id="query"></textarea>
              @if ($errors->has('message'))
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('message') }}</strong>
                 </span>
             @endif
           </div>
            <button type="submit" class="btn btn-style btn-top" >Send</button>
        </form>
        
            </div>
        </div>
    </section>
        </section>
 </main>
@endsection