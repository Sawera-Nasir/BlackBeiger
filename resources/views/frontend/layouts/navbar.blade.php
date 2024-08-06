</br>
<section class="ftco-section">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-8 order-md-last">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a class="navbar-brand" href="{{url('/')}}">BLACKBEIGER<sup>&#x1F12C</sup></a>
                    </div>
                    <div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
                        <form action="#" class="searchform order-lg-last">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search">
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-search"><i class="sr-only">Search</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-cart-shopping"><i class="sr-only">Cart-Shopping</i></span></a>

                  </div>
                </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-youtube"><i class="sr-only">Youtube</i></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>

      @if (getCategories()->isNotEmpty())
      @foreach(getCategories() as $category)
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a href="{{ url('/get-collection/' . $category->id) }}" class="nav-link">{{$category->name}}</a>
            </li>
        </ul>
      </div>
      @endforeach
      @endif


      
    </div>
  </nav>
<!-- END nav -->
</section>