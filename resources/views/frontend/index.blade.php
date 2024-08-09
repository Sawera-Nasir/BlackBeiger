@extends('frontend.layouts.main')
@section('content')

@extends('frontend.layouts.navbar')
	
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			@foreach($images as $index => $image)
				<div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
					<img class="d-block w-100" src="{{ asset($image->image_path) }}" alt="Slide {{ $index + 1 }}">
				</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</br>
	</div>


	<div class="collections-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   Collections   &#151&#151</a>
        </div>
	</div>
	<div class="collections">
		@foreach ($categories as $category)
			@if($category->showImage == 'Yes')
				<div class="collection-item">
					<img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
					<div class="collection-label">{{ $category->name }}</div>
				</div>
			@endif
		@endforeach
	</div>
</br>
	<div class="TRENDING-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   TRENDING   &#151&#151 </br><p style="font: 1em sans-serif;font-size: x-small;">Top view in this week</p></a>
        </div>
	</div>
	<div class="TRENDING-container">
    @foreach ($trendingProducts as $product)
        <div class="TRENDING-card">
            <img src="{{ url($product->image) }}" alt="{{ $product->title }}">
            @if($product->discount)
                <div class="discount">-{{ $product->discount }}%</div>
            @endif
            <div class="name">{{ $product->title }}</div>
            <div class="prices">
                @if($product->discount)
                    <span class="original-price">Rs.{{ number_format($product->price * (1 + $product->discount / 100), 2) }}</span>
                @endif
                <span> Rs.{{ number_format($product->price, 2) }}</span>
            </div>
        </div>
    @endforeach
	</div>
	<div class="load-more-container">
		<button class="load-more-button">Load More</button>
	</div>
</br>
	<div class="poduct-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   Trending Products   &#151&#151</a>
        </div>
	</div>
	<div class="product-container">
		@foreach ($trendingProductsSection as $product)
		<div class="product-card">
			<img src="{{ url($product->image) }}" alt="{{ $product->title }}">
			@if ($product->discount)
				<div class="discount">-{{ $product->discount }}%</div>
			@endif
			<div class="name">{{ $product->title }}</div>
			<div class="prices">
				@if ($product->compare_price && $product->price < $product->compare_price)
					<span class="original-price">Rs.{{ number_format($product->compare_price, 2) }}</span>
				@endif
				<span> Rs.{{ number_format($product->price, 2) }}</span>
			</div>
		</div>
		@endforeach
	</div>


	</br>

	<div class="Heels-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   Heels   &#151&#151</a>
        </div>
	</div>
	<div class="Heels-container">
		@foreach ($HeelsSection as $product)
		<div class="product-card">
			<img src="{{ url($product->image) }}" alt="{{ $product->title }}">
			@if ($product->discount)
				<div class="discount">-{{ $product->discount }}%</div>
			@endif
			<div class="name">{{ $product->title }}</div>
			<div class="prices">
				@if ($product->compare_price && $product->price < $product->compare_price)
					<span class="original-price">Rs.{{ number_format($product->compare_price, 2) }}</span>
				@endif
				<span> Rs.{{ number_format($product->price, 2) }}</span>
			</div>
		</div>
		@endforeach
	</div>

</br>

	<div class="FLATS-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   FLATS   &#151&#151</a>
		</div>
	</div>
	<div class="FLATS-container">
		@foreach ($FlatsSection as $product)
		<div class="product-card">
			<img src="{{ url($product->image) }}" alt="{{ $product->title }}">
			@if ($product->discount)
				<div class="discount">-{{ $product->discount }}%</div>
			@endif
			<div class="name">{{ $product->title }}</div>
			<div class="prices">
				@if ($product->compare_price && $product->price < $product->compare_price)
					<span class="original-price">Rs.{{ number_format($product->compare_price, 2) }}</span>
				@endif
				<span> Rs.{{ number_format($product->price, 2) }}</span>
			</div>
		</div>
		@endforeach
	</div>

	</br>

	<div class="KHUSSA-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   KHUSSA   &#151&#151</a>
		</div>
	</div>
	<div class="KHUSSA-container">
		@foreach ($KhussaSection as $product)
		<div class="product-card">
			<img src="{{ url($product->image) }}" alt="{{ $product->title }}">
			@if ($product->discount)
				<div class="discount">-{{ $product->discount }}%</div>
			@endif
			<div class="name">{{ $product->title }}</div>
			<div class="prices">
				@if ($product->compare_price && $product->price < $product->compare_price)
					<span class="original-price">Rs.{{ number_format($product->compare_price, 2) }}</span>
				@endif
				<span> Rs.{{ number_format($product->price, 2) }}</span>
			</div>
		</div>
		@endforeach
	</div>


	{{-- <div class="KHUSSA-container">
		<div class="KHUSSA-card">
			<img src="{{url('frontend/images/Ample (light brown).webp')}}" alt="Ample (light brown)">
			<div class="discount">-58%</div>
			<div class="name">Ample (light brown)</div>
			<div class="prices">
				<span class="original-price">Rs.5,000.00 </span>
				<span> Rs.2,090.00</span>
			</div>
		</div>
		<div class="KHUSSA-card">
			<img src="{{url('frontend/images/Snowball Khussa (off white pearl).webp')}}" alt="Snowball Khussa (off white pearl)">
			<div class="discount">-38%</div>
			<div class="name">Snowball Khussa (off white pearl)</div>
			<div class="prices">
				<span class="original-price">Rs.4,500.00</span>
				<span> Rs.2,790.00</span>
			</div>
		</div>
		<div class="KHUSSA-card">
			<img src="{{url('frontend/images/Soften khussa (nude).webp')}}" alt="Soften khussa (nude)">
			<div class="discount">-23%</div>
			<div class="name">Soften khussa (nude)</div>
			<div class="prices">
				<span class="original-price">Rs.2,800.00</span>
				<span> Rs.2,150.00</span>
			</div>
		</div>
		<div class="KHUSSA-card">
			<img src="{{url('frontend/images/Soften (black).webp')}}" alt="Soften (black)">
			<div class="discount">-23%</div>
			<div class="name">Soften (black)</div>
			<div class="prices">
				<span class="original-price">Rs.2,800.00</span>
				<span> Rs.2,150.00</span>
			</div>
		</div>
	</div> --}}
</br>

	<div class="Follow-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">Follow us @blackbeiger </a>
		</div>
	</div>
	</br>

	<div class="pictures">
		<div class="pictures-item">
            <img src="{{url('frontend/images/111.jpg')}}" alt="image1">
        </div>
        <div class="pictures-item">
            <img src="{{url('frontend/images/222.jpg')}}" alt="image2">
        </div>
        <div class="pictures-item">
            <img src="{{url('frontend/images/333.jpg')}}" alt="image3">
        </div>
        <div class="pictures-item">
            <img src="{{url('frontend/images/444.jpg')}}" alt="iamge4">
        </div>
	</br>
    </div>

	<div class="whatsapp-button">
        <a href="https://wa.me/YOURNUMBER" target="_blank" style="color: white; text-decoration: none;">
            <i class="fa fa-whatsapp"></i>
        </a>
    </div>
	</br>
	<div class="features-container">
		<div class="feature">
			<i class="fa fa-truck"></i>
			<h3>FREE DELIVERY</h3>
			<p>Free delivery all over Pakistan</p>
		</div>
		<div class="feature">
			<i class="fa fa-rotate-right"></i>
			<h3>HIGHLY COMFORTABLE SHOES</h3>
			<p>All the shoes are made highly comfortable and long lasting.</p>
		</div>
		<div class="feature">
			<i class="fa fa-exchange-alt"></i>
			<h3>RETURNS AND EXCHANGES</h3>
			<p>BlackBeiger's rider will come & exchange the shoes at your doorstep.</p>
		</div>
	</div>
	</br>

	<div class="preloader">
		<div class="loader"></div>
	</div>
@endsection




