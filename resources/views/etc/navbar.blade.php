<!-- Header Start -->
    <header class="position-absolute">    
      <!-- Top Navbar -->
      <nav class="web-top-navbar">
        <div class="row">
        <div class="col-sm-12 col-md-2">
          <a href="/" class="web-logo">
            <!-- Logo White -->
            <img class="logo-white" src="/public/images/icons/Logo.svg" alt="Web logo">
            <!-- Logo Dark -->
            <img class="logo-dark" src="/public/images/icons/Logo.svg" alt="">
          </a>
          <button class="nav-mob-btn" type="button">
            <i class="fa fa-bars show-mob-menu-btn"></i>
            <i class="fa fa-times hide-mob-menu-btn" style="display: none;"></i>
          </button>
        </div>
        <div class="menu-nav col-sm-12 col-md-10">
          <ul class="nav-menu-right" id="menu-list">
            <!-- <li class="{{ (request()->is('product')) ? 'active-item' : '' }} {{ (request()->is('product/*')) ? 'active' : '' }}"><a href="/product">Products</a></li>
            <li class="{{ (request()->is('gallery')) ? 'active-item' : '' }}">
                <a href="/gallery">Gallery</a>
            </li>
            <li class="{{ (request()->is('youtube-videos')) ? 'active-item' : '' }}">
                <a href="/youtube-videos">Videos</a>
            </li>
            <li class="{{ (request()->is('talk-astro')) ? 'active-item' : '' }}">
                  <a href="/talk-astro">Talk to Astro</a>
              </li> -->
              <!-- <li class="{{ (request()->is('today-rashifal')) ? 'active-item' : '' }}">
                  <a href="/today-rashifal">Today Rashifal</a>
              </li> -->
              <li class="{{ (request()->is('about-us')) ? 'active-item' : '' }}">
                  <a href="/about-us">About Us</a>
              </li>

              <li class="{{ (request()->is('contact-us')) ? 'active-item' : '' }}">
                  <a href="/contact-us">Contact Us</a>
              </li>
              <!-- <li class="on-desktop-hide on-mob-show">
                <a href="/cart">Cart</a>
              </li> -->
              @guest
              <li class="on-desktop-hide on-mob-show">
                <a href="/login">Login</a>
              </li>
               @if (Route::has('register'))
              <li class="on-desktop-hide on-mob-show"><a href="/register">Register</a></li>
                  @endif
               @else
               <li class="on-desktop-hide on-mob-show"><a href="/user-profile">Profile</a></li>
               @if(Auth::user()->role == "astrologer")
                <li class="on-desktop-hide on-mob-show"><a href="/astrologer/dashboard">Astrologer</a></li>
               @endif
               <li class="on-desktop-hide on-mob-show"><a href="/user-order">Orders</a></li>
               <li class="on-desktop-hide on-mob-show log-out"><a href="/logout">Logout</a></li>
               @endguest
              <li class="submenu {{ (request()->is('contact-us')) ? 'active-item' : '' }} on-mob-hide">
                  <a href="#">My Account</a>
                  <ul>
                      @guest
                         <li><a href="/login">Login</a></li>
                            @if (Route::has('register'))
                        <li><a href="/register">Register</a></li>
                            @endif
                         @else
                         <li><a href="/user-profile">Profile</a></li>
                         @if(Auth::user()->role == "astrologer")
                          <li><a href="/astrologer/dashboard">Astrologer</a></li>
                         @endif
                         <li><a href="/user-order">Orders</a></li>
                         <li class="log-out"><a href="/logout">Logout</a></li>
                      @endguest  
                  </ul>
              </li>
              <li class="js-show-header-dropdown on-mob-hide">
                <a href="#" class="header-wrapicon2">
                  <i class="fa fa-shopping-cart header-icon1 js-show-header-dropdown nav-cart-icon"></i>
                  <span class="header-icons-noti">@if(isset($cartCollection)) {{$cartCollection->count()}} @else 0 @endif</span>
                </a>
                                            <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                @if(isset($cartCollection))
                                    @foreach($cartCollection as $cart)
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="{{asset('/public/images/products/'.$cart->image)}}" alt="{{$cart->name}}">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            {{$cart->name}}
                                        </a>

                                        <span class="header-cart-item-info">
                                            {{$cart->qty}} x ₹{{$cart->price}}
                                        </span>
                                    </div>
                                </li>
                                     @endforeach
                                        @else
                                        <li class="header-cart-item">
                                            <p>You have no items in your shopping cart</p>
                                        </li>

                                        @endif
                            </ul>
                             @if(isset($cartCollection))
                            <div class="header-cart-total">
                                Total: ₹{{$subTotal}}
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/cart" class="btn cart_btn flex-c-m trans-0-4">
                                        View
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/clear-cart" class="btn cart_btn flex-c-m trans-0-4">
                                        Clear
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
              </li>
              <li>  
              </li>
          </ul>

        </div>
        </div>
      </nav>
    </header>
    <!-- end header