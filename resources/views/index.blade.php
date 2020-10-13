@extends('layouts.app')
@section('content') 

<!-- Slider Section -->
<section class="home-slider">
    <div id="home-slider" class="carousel slide" data-ride="carousel">

        <!-- The slideshow -->
        <div class="carousel-inner">
            @foreach($bannerSlide as $key => $slide)
            <div class="carousel-item {{ $key == 0 ? 'active':'' }} ">
                @if($slide->heading)
                <div class="slide-imge-overlay"></div>
                @endif
                <img src="{{asset('/public/images/banner/'.$slide->image)}}" alt="{{$slide->heading}}">
                <div class="caption">
                    <div class="container">
                        @if($slide->heading)
                        <div class="caption-in">
                            <div class="caption-ins">
                                <h1 class="text-up">{{$slide->heading}}<span>{{$slide->sub_heading}}</span></h1>
                                @if($slide->button_text)
                                <div class="links"> 
                                    <a href="{{$slide->button_link}}" class="btns slider-btn"><span>{{$slide->button_text}}</span></a> 
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#home-slider" aria-label="slide-next-btn" data-slide="prev">
            <span class="fa fa-angle-left"></span>
        </a>
        <a class="carousel-control-next" href="#home-slider" aria-label="slide-back-btn" data-slide="next">
            <span class="fa fa-angle-right"></span>
        </a>
    </div>
</section>

<!-- Daily Rashi Section -->
<!--  @if(isset($rashi))
@foreach($rashi as $todayRashi)
    <section class="daily-rashi-section section-top container">
        <h1 class="section-heading-txt heading-color text-center">आज का राशिफल</h1>
            <div class="today-date">{{ date('l, d/m/Y', strtotime($todayRashi->today_date)) }}</div>
            <p class="rashi-sub-heading">कैसा रहेगा आज का दिन आपके लिए? क्या कहते हैं आज के सितारे?</p>
        <div class="row m-t-30">
            <div class="col-sm-12 col-md-8 col-lg-9">

                <div class="row">
                   <div class="col-auto">
                    <a href="/today-rashifal/mesh">
                       <div class="rashi-box">
                           <div class="rashi-name">मेष</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/vrishabh">
                       <div class="rashi-box">
                           <div class="rashi-name">वृषभ</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/mithun">
                       <div class="rashi-box">
                           <div class="rashi-name">मिथुन</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/kark">
                       <div class="rashi-box">
                           <div class="rashi-name">कर्क</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/simha">
                       <div class="rashi-box">
                           <div class="rashi-name">सिंह</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/kanya">
                       <div class="rashi-box">
                           <div class="rashi-name">कन्या</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/tula">
                       <div class="rashi-box">
                           <div class="rashi-name">तुला</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/vrishchik">
                       <div class="rashi-box">
                           <div class="rashi-name">वृश्चिक</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/dhanu">
                       <div class="rashi-box">
                           <div class="rashi-name">धनु</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/makar">
                       <div class="rashi-box">
                           <div class="rashi-name">मकर</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/kumbh">
                       <div class="rashi-box">
                           <div class="rashi-name">कुंभ</div>
                       </div>
                     </a>
                   </div>
                   <div class="col-auto">
                    <a href="/today-rashifal/meen">
                       <div class="rashi-box">
                           <div class="rashi-name">मीन</div>
                       </div>
                     </a>
                   </div>
               </div> 
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
              <iframe width="100%" height="100%" src="https://www.youtube.com/embed/bpTzSylho_8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 20px;"></iframe>
              <script src="https://apis.google.com/js/platform.js"></script>
        <div class="g-ytsubscribe" data-channelid="UChU_RSRt7IiqxZTBg577yeQ" data-layout="default" data-count="default"></div>
            </div>
        </div>
    </section>
  @endforeach 
@endif-->

    <!-- Product Show Section Start -->

    <section class="programs-section section-top container">
      <h1 class="section-heading-txt heading-color text-center">Products</h1>
      <div class="row m-t-50">
        @foreach($products->take(6) as $product)
        <div class="col-md-4 mb-cols">
          <div class="product-view-window-div {{ ($product->product_types_id ==2) ? 'block2-labelnew' : '' }} {{ ($product->product_types_id ==1) ? 'block2-labelsale' : '' }}" style="background-image: url(/public/images/products/{{$product->image}});">
              <div class="slide-imge-overlay"></div>
            <div class="product-content">
                <a href="/product-details/{{$product->id}}"><h2 class="m-top heading-color2">{{$product->name}}</h2></a>
                <br>
                <p class="offer-text">₹{{$product->price}}</p>
                <button type="button" class="btn secondary_btn mt40 add-on-cart" addId="{{ $product->id }}">Add to Cart</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <a href="/product" class="btn btn-style on-mob-bottom-30" style="margin-top: 20px;width:150px !important;">View More</a>
<!--     <div class="row m-t-50">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4 p-b-50">
                    <div class="product-block">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative {{ ($product->product_types_id ==2) ? 'block2-labelnew' : '' }} {{ ($product->product_types_id ==1) ? 'block2-labelsale' : '' }}">
                            <img src="{{asset('/public/images/products/'.$product->image)}}" alt="{{$product->name}}">
                            <div class="block2-overlay trans-0-4">
                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <button class="flex-c-m trans-0-4 btn secondary_btn mt40 add-on-cart" addId="{{ $product->id }}">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="product-content p-t-20">
                            <a href="/product-details/{{$product->id}}" class="dis-block p-b-5">
                                <div class="title">{{$product->name}}</div>
                            </a>
                            <span class="product-price-txt">
                                ₹{{$product->price}}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--<div class="col-sm-12 col-md-4 col-lg-3">-->
               
        <!--</div>-->
    </div>

    </section>


 <script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>
 <script> 
    // $(document).ready(function(){
    //     setTimeout(function(){
    //         $("#startUpModal").modal('show');
    //     }, 5000);
        
    // });



        $('.add-on-cart').on('click', function(){
                var product_id = $(this).attr("addId");
                    // console.log(product_id);
                $.ajax({

                //type: "POST",

                dataType: 'json',
                url: "cart",
                method : 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'id='+product_id,
                success: function (data) {
                    if (data['success']) {
                       toastr.success("Product Add on Cart","Successfuly");
                        window.location.href = '/cart';
                    } else if (data['error']) {
                       toastr.error(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                    
                },
                error: function (data) {
                    toastr.error(data.responseText,"error");
                }
                });
            });

        // Nothing new here...it's all in the CSS!
    var scene = document.getElementById('para_sec');
    var parallax = new Parallax(scene);
            
</script>
 @endsection