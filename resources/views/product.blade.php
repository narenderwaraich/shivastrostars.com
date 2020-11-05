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


      @if($products->count())
      <section class="section-top-padding product-section container">
        <h2 class="fs-50 text-center">Our Products</h2>
        <hr class="under-line">
        <div class="row">
        	<div class="col-md-3">
        		<div class="siderbar p-r-20 p-r-0-sm">
					<label class="p-b-7 heading-title" for="category">Categories</label>
				<select name="" class="form-control select-category" id="category">
					<option value="/product">All</option>
					@foreach($category as $categoryData)
					<option value="/product/category/{{$categoryData->name}}" {{ url()->current() === env('APP_URL').'/product/category/'.$categoryData->name ? "selected":"" }}>{{$categoryData->name}}</option>
					@endforeach
				</select>

						

<!-- 						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div> -->
					</div>
        	</div>
        	<div class="col-md-9">
        		<form action="/products/search" method="POST" id="SearchData" role="search">
    		{{ csrf_field() }}
			<div class="search-product pos-relative of-hidden">
				<label class="dis-none" for="search">Search</label>
				<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" id="search" value="{{request('search-product')}}" placeholder="Search Products..." required width="70%">

				<button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
					<i class="fs-25 fa fa-search" aria-hidden="true"></i>
					<span class="dis-none">Search</span>
				</button>
			</div>
		</form>
		   <div class="row m-t-50">
          @foreach($products->take(6) as $product)
          <div class="col-md-6 mb-cols">
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

        	</div>
        </div>
      </section>
      @endif

    </main>

 <script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>

	<script> 
		$('.add-on-cart').on('click', function(){
                var product_id = $(this).attr("addId");
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
                       //swal(nameProduct, "is already added to cart !", "error");
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                    
                },
                error: function (data) {
                    toastr.error("Please Login First","Sorry");
                }
	            });
            });

		$('.select-category').change(function(){
			var selectedCategory = $(this).children("option:selected").val();
			window.location.href = selectedCategory;
		});
        	
</script>


@endsection