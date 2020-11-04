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
        @if($gallery->count())
        <section class="section-top-padding container">
          <div class="row">
            @foreach($gallery as $item)
              <div class="col-sm-12 col-md-4 col-lg-4 p-b-20 pad-l-r-10">
                  <a class="image-with-hover-overlay image-hover-zoom" href="{{asset('/public/images/gellery/'.$item->image)}}">
                    <div class="image-hover-overlay background-primary"> 
                      <div class="image-hover-overlay-content text-center padding-2x"> 
                        <p>{{ $item->description }}</p> 
                      </div> 
                    </div> 
                    <img src="{{asset('/public/images/gellery/'.$item->image)}}" alt="{{ $item->title }}" title="{{ $item->title }}" />
                  </a>  
              </div>
              @endforeach
              {!! $gallery->links() !!}
          </div>
        </section>
         @endif
    </main> 


  <!-- content page -->
<!--   <section class="bgwhite m-t-70">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-9 p-b-75">
          @foreach($gallery as $item)
          <div class="p-r-50 p-r-0-lg">
          
            <div class="item-blog p-b-20">
              <a href="#" class="item-blog-img pos-relative dis-block hov-img-zoom">
                <img src="{{asset('/public/images/gellery/'.$item->image)}}" alt="{{ $item->title }}">

                <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
                  {{ date('d/m/Y', strtotime($item->created_at)) }}
                </span>
              </a>

              <div class="item-blog-txt p-t-33">
                <div class="p-b-11 heading-title">
                  <a href="#" class="m-text24">
                    {{ $item->title }}
                  </a>
                </div>

                <p class="p-b-12">
                  {{ $item->description }}
                </p>
              </div>
            </div>
          </div>
          @endforeach
              {!! $gallery->links() !!}
        </div>

        <div class="col-md-4 col-lg-3 p-b-75">
          <div class="rightbar">
  
          </div>
        </div>
      </div>
    </div>
  </section> -->
   <script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>
@endsection
