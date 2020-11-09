@extends('layouts.app')
@section('content') 

<!-- MAIN -->
    <main>    
      <!-- Main Header -->
      @if(isset($banner))
      <header>
        <div class="carousel-default owl-carousel carousel-main carousel-nav-white background-dark text-center">
          <div class="item">
            <div class="col-sm-12 p-l-0 p-r-0">
              <img src="{{asset('/public/images/banner/'.$banner->image)}}" alt="{{$banner->heading}}">
              <div class="carousel-content">
                <div class="content-center-vertical">
                  <div class="m-t-b-80">
                    <!-- Banner Title -->
                    @if($banner->heading)
                    <h1 class="text-white m-b-30 fs-60 text-m-size-30">{{$banner->heading}}</h1>
                    <div class="col-sm-12 col-md-10 col-lg-8 center"><p class="text-white fs-14 m-b-40">{{$banner->sub_heading}}</p></div>
                    @if($banner->button_text)
                    <div class="">
                      <div class="col-sm-12 col-md-12 col-lg-3 center">
                        <a class="btn banner-btn col-sm-12" href="{{$banner->button_link}}">{{$banner->button_text}}</a>
                      </div>       
                    </div>
                    @endif
                    @endif  
                  </div>
                </div>
              </div>
            </div>
          </div>              
        </div>               
      </header>
      @endif

      {{$whatsappBtn}}

      @if(isset($astroWorkMainSection))
      <section class="section-top-padding astrologers-work-section container">
        @if($astroWorkMainSection->section == "main_section") 
          <h2 class="fs-50 text-center">{{$astroWorkMainSection->section_heading}}</h2>
          <hr class="under-line">
          <div class="about-content-section m-t-30">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <img src="/public/images/bg/{{$astroWorkMainSection->bg_img}}" alt="" style="margin: auto;text-align: center;">
                <p class="m-t-30">{{$astroWorkMainSection->section_content}}</p>
              </div> 
            </div>
          </div>
          <a href="tel:+919358027151" class="btn btn-style on-mob-bottom-30" style="margin-top: 20px;width:150px !important;">Call Now</a>
        @endif
      </section>
      @endif

      @if($products->count())
      <section class="section-top-padding product-section container">
        <h2 class="fs-50 text-center">Our Products</h2>
        <hr class="under-line">
        <div class="row">
          @foreach($products->take(6) as $product)
          <div class="col-md-4 mb-cols">
            <div class="product-div">
              <a href="/product-details/{{$product->id}}">
                <img src="/public/images/products/{{$product->image}}" alt="{{$product->name}}">
              </a>
              <a href="/product-details/{{$product->id}}">
                <h2 class="m-t-20">{{$product->name}}</h2>
              </a>
                <p class="product-price">@if($product->cross_price)<span style="color: #ce2350;font-weight: 600;text-decoration: line-through;">₹{{$product->cross_price}}</span> - @endif ₹{{$product->price}}</p>
              <button type="button" class="btn secondary_btn mt40 add-on-cart" addid="{{ $product->id }}">Add to Cart</button>
            </div>
          </div>
          @endforeach
      </div>
      </section>
      @endif
      @if(isset($paraSection))
      @if($paraSection->section == "parallax")
      <section>
        <div class="parallax-container" id="para_sec" style="background-image: url(/public/images/bg/{{$paraSection->bg_img}});">
           <div class="row">
               <div class="col-md-6">
                   <div class="offer-section">
                       <div class="top-tile">
                         Kundli Offer
                       </div>
                       <div class="content">
                           <p>First user for special offer get 90% discount on apply Get Kundli.
                           </p>
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
    <div class="form-box-sec">
        <div class="top-tile">
            Get Kundli
        </div>
        <form method="POST" action="/get-kundli" class="parallax-form" autocomplete="off">
            @csrf
            <label for="fname" class="dis-none">FName</label>
            <input  type="text" id="fname" class="form-box-input form-control" name="name" value="" placeholder="Name" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <label for="eaddress" class="dis-none">EAddress</label>
            <input type="email" id="eaddress" class="form-box-input form-control" name="email" value="" placeholder="Email" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            
            <label class="dis-none" for="phone">Phone</label>
            <input id="phone" type="number" class="form-box-input form-control" name="phone_no" placeholder="Phone">
            <select name="gender" id="select" required class="form-box-input form-control " style="height: 50px;">
              <option value="">-- Select Gender--</option>    
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>

            <label for="db" class="dis-none">Date of Birth</label>
            <input id="db" type="date" class="form-box-input form-control" name="db" placeholder="Date of Birth" required>

            <label for="place" class="dis-none">Birth Place</label>
            <input id="place" type="text" class="form-box-input form-control" name="place" placeholder="Birth Place" required>
        <button type="submit" class="btn btn-style btn-top" >Submit</button>
        </form>
    </div>
               </div>
           </div>
        </div>
    </section>
    @endif
    @endif
    @if($astrologers->count())
    <section class="section-top-padding astrologer-section container bgwhite text-center">
        <div class="">
          <h2 class="fs-50 text-center">Our Astrologers</h2>
          <hr class="under-line">
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <div class="item">
              <div class="col-sm-12 col-md-12 col-lg-12 center text-center">
                <img class="image-testimonial-small" src="" alt="">
                <p class="astro-desc margin-bottom fs-20">Astrologer Description</p>
                <p class="astro-postion fs-16">Astrologer</p>
              </div>
            </div>
            <div class="item"> 
              <div class="col-sm-12 col-md-12 col-lg-12 center text-center">
                <img class="image-testimonial-small" src="img/testimonials-05.png" alt="">
                <p class="astro-desc margin-bottom fs-20">Astrologer Description</p>
                <p class="astro-postion fs-16">Astrologer</h5>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif
<!--       <section class="section-top-padding container-fluid">
        <h2 class="fs-50 text-center">Our Work</h2>
        <hr class="under-line">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#chat">Chat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#kundli">Kundli</a>
            </li>
          </ul>
              <div class="tab-content">
                <div id="gallery" class="tab-pane active">

                </div>
                <div id="chat" class="tab-pane">
                  <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0"> 
                    </div>
                  </div>
                </div>

              <div id="kundli" class="tab-pane">
              </div>
              </div>
      </section> -->
      @if($gellery->count())
      <section class="section-top-padding container-fluid">
        <h2 class="fs-50 text-center">Our Gallery</h2>
        <hr class="under-line">
          <div class="row">
            @foreach($gellery->take(8) as $item)
            <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
            <a class="image-with-hover-overlay image-hover-zoom" href="{{asset('/public/images/gellery/'.$item->image)}}">
              <div class="image-hover-overlay background-primary"> 
                <div class="image-hover-overlay-content text-center padding-2x">
                  <h2 class="text-thin">{{ $item->title }}</h2> 
                  <p>{{ $item->description }}</p> 
                </div> 
              </div> 
              <img src="{{asset('/public/images/gellery/'.$item->image)}}" alt="{{ $item->title }}" title="{{ $item->title }}" />
            </a>  
          </div>
          @endforeach
          </div>
      </section>
      @endif
      @if($videos->count())
        <section class="blog bgwhite section-top-padding">
        <div class="container">
            <h2 class="fs-50 text-center">Our Videos</h2>
            <hr class="under-line">
            <div class="row">
              @foreach ($videos->take(6) as $videoData)
                <div class="col-sm-12 col-md-4 p-b-30 m-l-r-auto">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $videoData->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>  
                    <div class="block3-txt p-t-14">
                        <div class="video-heading-title p-b-7">
                            {{ $videoData->title}}
                        </div>
                        <span class="s-text6">By</span> <span class="s-text7">{{ $videoData->auth}}</span>
                        <span class="s-text6">on</span> <span class="s-text7">{{$videoData->created_at->format('j M, Y')}}</span>
                    </div>
                </div>
                @endforeach
              </div>
            <a href="/youtube-videos" class="btn btn-style on-mob-bottom-30" style="margin-top: 20px;width:150px !important;">View More</a>
        </div>
    </section>
    @endif
  </main>


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


            
</script>
 @endsection