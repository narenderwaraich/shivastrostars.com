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


<section class="chat-background-image-style" style="background-image: url(../images/footer-bg.jpg);">
  <div class="container-fluid chat-background-opacity-bg">
	    <div class="container chat-box-h">



	@foreach ($messages->take(3) as $message)
		@if($message->user_message)
	    	<div class="user-message-chat-box @if($message->message_status =='Sent') sent-msg-status @endif @if($message->message_status =='Reply') reply-msg-status @endif">
	    	@if($message->file)
	    		<img src="/public/images/user/messages/{{$message->file}}" style="width: 320px;">
	    	@endif
	    	<div class="user-name-show">{{ Auth::user()->name }}</div>
	    	<p class="user-message-drop">{!! nl2br($message->user_message) !!}</p>
	    	<div class="message-status-{{ $message->message_status }}">{{ $message->message_status }}</div>
	    	</div>
	    @endif
	    @if($message->reply_message)
	    	<div class="admin-message-chat-box">
	    	<div class="admin-name-show">Astrologer</div>
	    	<p class="admin-message-drop">{!! nl2br($message->reply_message) !!}</p>
	    	</div>
	    @endif
	    @if($message->message_status == "Pending")
	    	<div class="message-chat-plan animation-css">
	    	<p class="plan-text-msg">Please choose first any chat plan click on Buy</p>
	    		<a href="/buy/plan"><button type="button" class="btn btn-style btn-top" >Buy Now</button></a>
	    	</div>
	    @endif

	    @if($message->message_status == "Sent")
	    	<div class="message-chat-plan animation-css border-px">
	    	<p class="plan-text-msg">Please Wait... (Your Message Reply within 24hrs)</p>
	    	</div>
	    @endif

	@endforeach
    	
	    	
	    	<div class="chat-box">
	    		<form method="POST" action="/send-message" enctype="multipart/form-data" class="chat-form">
                	@csrf
                	<div class="astro-info-box full-w" style="width: 70%;margin-right: auto;margin-left: auto;margin-bottom: 30px;position: relative;display: none;">

                				<img src="" id="astroLogo" style="width: 80px;height: 80px;border-radius: 100%;">
                				<img src="/public/images/user/user.jpg" id="dumyLogo" style="width: 80px;height: 80px;border-radius: 100%;">
                				<div style="position: absolute;top: 29px;left: 95px;">From <span id="city"></span> (<span id="state"></span>)</div>

                	</div>
                	<select name="astrologer" id="astrologer"  class="input-style form-control {{ $errors->has('astrologer') ? ' is-invalid' : '' }}" required style="margin-bottom: 25px;width: 70%;color: #fff;background: transparent;border: 2px solid #ff9e80 !important;">
                        <option value="">--Select Astrologer--</option>   
                              <option value="">Guru Ji</option>
                    </select>
                    @if ($errors->has('astrologer'))
			               <span class="invalid-feedback full-w" role="alert" style="width: 70%;margin-right: auto;margin-left: auto;">
			                   <strong>{{ $errors->first('astrologer') }}</strong>
			               </span>
			        @endif
			        <p class="full-w" style="color: #fff;width: 70%;margin: auto;font-size: 13px;">if send any file or image choose size (max 2mb)</p>
			        <input type="file" name="file" class="input-style full-w form-control {{ $errors->has('file') ? ' is-invalid' : '' }}" style="margin-bottom: 30px;width: 70%;color: #fff;background: transparent;border: 2px solid #ff9e80 !important;">
			        @if ($errors->has('file'))
			               <span class="invalid-feedback full-w" role="alert" style="width: 70%;margin-right: auto;margin-left: auto;">
			                   <strong>{{ $errors->first('file') }}</strong>
			               </span>
			        @endif  
	    			<textarea class="form-control form-chat-box {{ $errors->has('user_message') ? ' is-invalid' : '' }}" id="msg" name="user_message" rows="8" placeholder="Type Message Here"></textarea>
			            @if ($errors->has('user_message'))
			               <span class="invalid-feedback full-w" role="alert" style="width: 70%;margin-right: auto;margin-left: auto;">
			                   <strong>{{ $errors->first('user_message') }}</strong>
			               </span>
			           @endif
	           <button type="submit" class="btn btn-style btn-top full-w" >Send</button>
	    		</form>
	    	</div>
	    </div>
  </div>
</section>
</main>

<style type="text/css">
	.footer {
    margin-top: 0px;
	}
select option {
  background: rgba(0, 0, 0, 0.3);
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}

select option[value="1"] {
  background: #ff9e80;
}
.border-px{
	border:5px solid #ff9e80;
}
.reply-msg-status{
	border: 2px solid #FF8800;
}
.sent-msg-status{
	border: 2px solid #00C851;
}

@keyframes blink { 
   50% { border-color: #fff;
   background-color:  #000;} 
}
.animation-css{ 
    animation: blink .5s step-end infinite alternate;
}
</style>
 <script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>
 <script> 
     $(document).ready(function(){
           $('#astrologer').on('change', function() {
              var ID = $(this).val();
              if(ID){
  	            $.ajax({
                  type: 'GET',
                  url: '/getAstrologer?astrologer_id='+ID,
                  dataType: 'json',
                  success: function(data){
                    console.log(data);
                    $(".astro-info-box #astro-name").text(data.name);
                    // $(".astro-info-box #address").text(data.address);
                    $(".astro-info-box #city").text(data.city);
                    $(".astro-info-box #state").text(data.state);
                    // $(".astro-info-box #country").text(data.country);
                    $(".astro-info-box #astroLogo").attr('src','/public/images/user/'+data.avatar);
                    if(!data.avatar){
                      $('#astroLogo').hide();
                      $('#dumyLogo').show();
                    }else{
                      $('#astroLogo').show();
                      $('#dumyLogo').hide();
                    }
                     
                    $('.astro-info-box').show();
                  }
                });
              }else{
                $('.astro-info-box').hide();
              }
           });
 	});
 </script>
@endsection