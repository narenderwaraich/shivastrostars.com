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
            <li class="{{ (request()->is('product')) ? 'active-item' : '' }} {{ (request()->is('product/*')) ? 'active' : '' }}"><a href="/product">Products</a></li>
    <!--         <li class="submenu">
              <a href="#">Services</a>
                <ul>
                  <li><a href="#">Service A</a></li>
                  <li><a href="#">Service B</a></li>
                </ul>
            </li> -->
            <li class="{{ (request()->is('gallery')) ? 'active-item' : '' }}">
                <a href="/gallery">Gallery</a>
            </li>
            <li class="{{ (request()->is('youtube-videos')) ? 'active-item' : '' }}">
                <a href="/youtube-videos">Videos</a>
            </li>
            <li class="{{ (request()->is('talk-astro')) ? 'active-item' : '' }}">
                  <a href="/talk-astro">Talk to Astro</a>
              </li>
              <!-- <li class="{{ (request()->is('today-rashifal')) ? 'active-item' : '' }}">
                  <a href="/today-rashifal">Today Rashifal</a>
              </li> -->
              <li class="{{ (request()->is('about-us')) ? 'active-item' : '' }}">
                  <a href="/about-us">About Us</a>
              </li>

              <li class="{{ (request()->is('contact-us')) ? 'active-item' : '' }}">
                  <a href="/contact-us">Contact Us</a>
              </li>
          </ul>
        </div>
        </div>
      </nav>
    </header>
    <!-- end header -->