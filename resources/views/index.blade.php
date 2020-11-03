@extends('layouts.app')
@section('content') 

<!-- MAIN -->
    <main>    
      <!-- Main Header -->
      <header>
        <div class="carousel-default owl-carousel carousel-main carousel-nav-white background-dark text-center">
          <div class="item">
            <div class="col-sm-12 p-l-0 p-r-0">
              <img src="/images/bg/header.jpg" alt="">
              <div class="carousel-content">
                <div class="content-center-vertical">
                  <div class="m-t-b-80">
                    <!-- Banner Title -->
                    <h1 class="text-white m-b-30 fs-60 text-m-size-30">Banner Heading<br> Text</h1>
                    <div class="col-sm-12 col-md-10 col-lg-8 center"><p class="text-white fs-14 m-b-40">Banner content here..</p></div>
                    <div class="">
                      <div class="col-sm-12 col-md-12 col-lg-3 center">
                        <a class="btn banner-btn col-sm-12" href="/">Get Started Now</a>
                      </div>       
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>              
        </div>               
      </header>

      <section class="section-top-padding product-section container">
        <h2 class="fs-50 text-center">Our Products</h2>
        <hr class="under-line">
        <div class="row">

          <div class="col-md-4 mb-cols">
            <div class="product-div">
              <a href="">
                <img src="" alt="">
              </a>
              <a href="">
                <h2 class="m-t-20"></h2>
              </a>
                <p class="product-price"></p>
              <button type="button" class="btn secondary_btn mt40 add-on-cart" addid="">Add to Cart</button>
            </div>
          </div>

      </div>
      </section>

          <section>
        <div class="parallax-container" id="para_sec">
           <div class="row">
               <div class="col-md-6">
                   <div class="offer-section">
                       <div class="top-tile">
                            Offer
                       </div>
                       <div class="content">
                           <p>First user for special offer get 20% discount on first order.
                            Register Now or apply <span>GET20</span> Coupan Voucher Code.
                           </p>
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
    <div class="form-box-sec">
        <div class="top-tile">
            Register
        </div>
        <form method="POST" action="" class="parallax-form" autocomplete="off">
            <!-- @csrf -->

            <label for="fname" class="dis-none">FName</label>
            <input  type="text" id="fname" class="form-box-input form-control" name="name" value="" placeholder="Name" required>

            <!-- @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif -->
            <label for="eaddress" class="dis-none">EAddress</label>
            <input type="email" id="eaddress" class="form-box-input form-control" name="email" value="" placeholder="Email" required>

            <!-- @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif -->
            <label for="password" class="dis-none">Password</label>
            <input id="password" type="password" class="form-box-input form-control" name="password" placeholder="Password" required>

            <!-- @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif -->

            <label class="dis-none" for="phone">Phone</label>
            <input id="phone" type="number" class="form-box-input form-control" name="phone_no" placeholder="Phone">
            <select name="gender" id="select" required class="form-box-input form-control " style="height: 50px;">
              <option value="">-- Select Gender--</option>    
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
 
        <button type="submit" class="btn btn-style btn-top" >Submit</button>
        </form>
    </div>
               </div>
           </div>
        </div>
    </section>

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

  
      <section class="section-top-padding container-fluid">
        <h2 class="fs-50 text-center">Our Gallery</h2>
        <hr class="under-line">
        <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#profile">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#chat">Chat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#kundli">Kundli</a>
            </li>
          </ul>
                <div class="tab-content">
                  <div id="profile" class="tab-pane active">
                  <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/portfolio-02.jpg">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-02.jpg" alt="" title="Portfolio Image 1" />
                  </a>  
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/video.mp4">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-09.jpg" alt="" title="Portfolio Image 2" />
                  </a>  
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/portfolio-08.jpg">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-08.jpg" alt="" title="Portfolio Image 3" />
                  </a>  
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/portfolio-05.jpg">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-05.jpg" alt="" title="Portfolio Image 4" />
                  </a>  
                </div>
                </div>
                </div>


                <div id="chat" class="tab-pane">
                  <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/portfolio-07.jpg">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-07.jpg" alt="" title="Portfolio Image 13" />
                  </a>  
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/portfolio-13.jpg">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-13.jpg" alt="" title="Portfolio Image 14" />
                  </a>  
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/video.mp4">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-11.jpg" alt="" title="Portfolio Image 15" />
                  </a>  
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 pad-l-r-0">
                  <a class="image-with-hover-overlay image-hover-zoom" href="img/portfolio/portfolio-04.jpg">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x">
                        <h2 class="text-thin">Lorem Ipsum Dolor</h2> 
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</p> 
                      </div> 
                    </div> 
                    <img src="img/portfolio/thumb-04.jpg" alt="" title="Portfolio Image 16" />
                  </a>  
                </div>
                  </div>
                </div>

              <div id="kundli" class="tab-pane">
              </div>
              </div>
      </section>

        <section class="blog bgwhite section-top-padding">
        <div class="container">
            <h2 class="fs-50 text-center">Our Videos</h2>
            <hr class="under-line">
            <div class="row">
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">

                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/keIrUBONCfM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>  

                    <div class="block3-txt p-t-14">
                        <div class="video-heading-title p-b-7">
                                अपने बारे कुंडली दिखाकर कुछ भी पूछिए और कमाइए पैसे
                        </div>

                        <span class="s-text6">By</span> <span class="s-text7">Pandit Manik Bhardwaj Shashtri Ji</span>
                        <span class="s-text6">on</span> <span class="s-text7">12 Jul, 2020</span>
                    </div>
                    
                </div>
                             <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">

                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/U_X2B5ZzfO8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>  

                        <div class="block3-txt p-t-14">
                            <div class="video-heading-title p-b-7">
                                    How to talk with Astrologers
                            </div>

                            <span class="s-text6">By</span> <span class="s-text7">Narender Waraich</span>
                            <span class="s-text6">on</span> <span class="s-text7">21 Jun, 2020</span>
                        </div>
                    
                </div>
                             <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">

                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/bpTzSylho_8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>  

                        <div class="block3-txt p-t-14">
                            <div class="video-heading-title p-b-7">
                                    How to Register Account
                            </div>

                            <span class="s-text6">By</span> <span class="s-text7">Narender Waraich</span>
                            <span class="s-text6">on</span> <span class="s-text7">21 Jun, 2020</span>
                        </div>
                    
                </div>
                         </div>
            <a href="/youtube-videos" class="btn btn-style on-mob-bottom-30" style="margin-top: 20px;width:150px !important;">View More</a>
        </div>
    </section>
      
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