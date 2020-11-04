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

      @if(isset($sectionImg))
        <div class="section-top-padding about-us-section container">
          @if($sectionImg->section == "main_section") 
            <h2 class="fs-40">{{$sectionImg->section_heading}}</h2>
            <hr class="under-line">
            <p class="m-t-35">{{$sectionImg->section_content}}</p> 
          @endif 
            <div class="about-content-section m-t-30">
              <div class="row">
                @if($sectionImg->section == "section1")
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <img src="img/img-01.jpg" alt="">
                  <p class="m-t-30">{{$sectionImg->section_content}}</p>
                </div>
                @endif 
                @if($sectionImg->section == "section2")
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <img src="img/img-02.jpg" alt="">
                  <p class="m-t-30">{{$sectionImg->section_content}}</p>
                </div>
                @endif 
              </div>
            </div>      
        </div>
        @endif 

</main>
@endsection
