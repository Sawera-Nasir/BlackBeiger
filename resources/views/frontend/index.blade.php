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

	{{-- <div class="TRENDING-container">
        <div class="TRENDING-card">
            <img src="{{url('frontend/images/crystal-flower.webp')}}" alt="Crystal Flower">
            <div class="discount">-30%</div>
            <div class="name">CRYSTAL FLOWER</div>
            <div class="prices">
                <span class="original-price">Rs.4,000.00</span>
                <span> Rs.2,800.00</span>
            </div>
        </div>
        <div class="TRENDING-card">
            <img src="{{url('frontend/images/hazel.webp')}}" alt="Hazel">
            <div class="discount">-41%</div>
            <div class="name">Hazel</div>
            <div class="prices">
                <span class="original-price">Rs.4,900.00</span>
                <span> Rs.2,915.00</span>
            </div>
        </div>
        <div class="TRENDING-card">
            <img src="{{url('frontend/images/croc-textured.webp')}}" alt="Croc Textured">
            <div class="discount">-40%</div>
            <div class="name">Croc Textured</div>
            <div class="prices">
                <span class="original-price">Rs.4,200.00</span>
                <span> Rs.2,525.00</span>
            </div>
        </div>
	
		<div class="TRENDING-card">
			<img src="{{url('frontend/images/estelle.webp')}}" alt="Estelle">
			<div class="discount">-41%</div>
			<div class="name">ESTELLE</div>
			<div class="prices">
				<span class="original-price">Rs.4,200.00</span>
				<span> Rs.2,463.00</span>
			</div>
		</div>
		<div class="TRENDING-card">
			<img src="{{url('frontend/images/marie.webp')}}" alt="Marie - Brown">
			<div class="discount">-33%</div>
			<div class="name">MARIE - BROWN</div>
			<div class="prices">
				<span class="original-price">Rs.2,345.00</span>
				<span> Rs.2,390.00</span>
			</div>
		</div>
		<div class="TRENDING-card">
			<img src="{{url('frontend/images/croc-textured-black.webp')}}" alt="Croc Textured - Black">
			<div class="discount">-40%</div>
			<div class="name">Croc Textured - Black</div>
			<div class="prices">
				<span class="original-price">Rs.4,200.00</span>
				<span> Rs.2,525.00</span>
			</div>
		</div>
		<div class="TRENDING-card">
			<img src="{{url('frontend/images/daisy-hot-pink.webp')}}" alt="DAISY - HOT PINK">
			<div class="discount">-38%</div>
			<div class="name">DAISY - HOT PINK</div>
			<div class="prices">
				<span class="original-price">Rs.4,990.00</span>
				<span> Rs.3,070.00</span>
			</div>
		</div>
		<div class="TRENDING-card">
			<img src="{{url('frontend/images/azure-black.webp')}}" alt="AZURE - BLACK">
			<div class="discount">-38%</div>
			<div class="name">AZURE - BLACK</div>
			<div class="prices">
				<span class="original-price">Rs.4,580.00</span>
				<span> Rs.2,860.00</span>
			</div>
		</div>		
    </div> --}}


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
		<div class="product-card">
            <img src="{{url('frontend/images/RAINBOW.webp')}}" alt="RAINBOW">
            <div class="discount">-43%</div>
            <div class="name">RAINBOW</div>
            <div class="prices">
                <span class="original-price">Rs.4,500.00</span>
                <span> Rs.2,585.00</span>
            </div>
        </div>
		<div class="product-card">
            <img src="{{url('frontend/images/Transparent Strap.webp')}}" alt="Transparent Strap">
            <div class="discount">-36%</div>
            <div class="name">Transparent Strap</div>
            <div class="prices">
                <span class="original-price">Rs.3,800.00</span>
                <span> Rs.2,440.00</span>
            </div>
        </div>
		<div class="product-card">
            <img src="{{url('frontend/images/Ancly 3.0.webp')}}" alt="Ancly 3.0">
            <div class="discount">-48%</div>
            <div class="name">Ancly 3.0</div>
            <div class="prices">
                <span class="original-price">Rs.4,500.00</span>
                <span> Rs.2,345.00</span>
            </div>
        </div>
		<div class="product-card">
            <img src="{{url('frontend/images/ZEBRA (LIMITED STOCK).webp')}}" alt="ZEBRA (LIMITED STOCK)">
            <div class="discount">-42%</div>
            <div class="name">ZEBRA (LIMITED STOCK)</div>
            <div class="prices">
                <span class="original-price">Rs.4,600.00</span>
                <span> Rs.2,690.00</span>
            </div>
        </div>
		
	</div>
	</br>

	<div class="Heels-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   Heels   &#151&#151</a>
        </div>
	</div>
	<div class="Heels-container">
		<div class="Heels-card">
            <img src="{{url('frontend/images/RAINBOW.webp')}}" alt="RAINBOW">
            <div class="discount">-43%</div>
            <div class="name">RAINBOW</div>
            <div class="prices">
                <span class="original-price">Rs.4,500.00</span>
                <span> Rs.2,585.00</span>
            </div>
        </div>
		<div class="Heels-card">
            <img src="{{url('frontend/images/Plenty.webp')}}" alt="Plenty">
            <div class="discount">-30%</div>
            <div class="name">Plenty</div>
            <div class="prices">
                <span class="original-price">Rs.4,000.00</span>
                <span> Rs.2,799.00</span>
            </div>
        </div>
		<div class="Heels-card">
            <img src="{{url('frontend/images/BRONZE.webp')}}" alt="BRONZE">
            <div class="discount">-46%</div>
            <div class="name">BRONZE</div>
            <div class="prices">
                <span class="original-price">Rs.5,990.00</span>
                <span> Rs.3,250.00</span>
            </div>
        </div>
		<div class="Heels-card">
            <img src="{{url('frontend/images/PARIS.webp')}}" alt="PARIS">
            <div class="discount">-45%</div>
            <div class="name">PARIS</div>
            <div class="prices">
                <span class="original-price">Rs.5,990.00</span>
                <span> Rs.3,285.00</span>
            </div>
        </div>
	</div>
</br>

	<div class="FLATS-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   FLATS   &#151&#151</a>
		</div>
	</div>
	<div class="FLATS-container">
		<div class="FLATS-card">
			<img src="{{url('frontend/images/CHIC MULES.webp')}}" alt="CHIC MULES">
			<div class="discount">-43%</div>
			<div class="name">CHIC MULES</div>
			<div class="prices">
				<span class="original-price">Rs.4,100.00 </span>
				<span> Rs.2,325.00</span>
			</div>
		</div>
		<div class="FLATS-card">
			<img src="{{url('frontend/images/RACHEL.webp')}}" alt="RACHEL">
			<div class="discount">-42%</div>
			<div class="name">RACHEL</div>
			<div class="prices">
				<span class="original-price">Rs.4,150.00</span>
				<span> Rs.2,415.00</span>
			</div>
		</div>
		<div class="FLATS-card">
			<img src="{{url('frontend/images/RINGS.webp')}}" alt="RINGS">
			<div class="discount">-51%</div>
			<div class="name">RINGS</div>
			<div class="prices">
				<span class="original-price">Rs.4,505.00</span>
				<span> Rs.2,210.00</span>
			</div>
		</div>
		<div class="FLATS-card">
			<img src="{{url('frontend/images/Greeny Pump.webp')}}" alt="Greeny Pump">
			<div class="discount">-30%</div>
			<div class="name">Greeny Pump</div>
			<div class="prices">
				<span class="original-price">Rs.3,800.00</span>
				<span> Rs.2,644.00</span>
			</div>
		</div>
	</div>
	</br>

	<div class="KHUSSA-title">
		<div class="col-md-12 text-center">
			<a class="navbar-brand" href="{{url('/')}}">&#151&#151   KHUSSA   &#151&#151</a>
		</div>
	</div>
	<div class="KHUSSA-container">
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
	</div>
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
@endsection




