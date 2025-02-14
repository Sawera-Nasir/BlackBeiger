<style>
    
button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

/* #cartButton-wrap {
    position: absolute;
    top: 20px;
    right: 20px;
} */
#cartButton-wrap svg{
    cursor: pointer;
    position: absolute;
    top: 7px;
    right: 120px;
}

.sidebar {
    position: fixed;
    top: 0;
    right: -300px; /* Hidden by default */
    width: 300px;
    height: 100%;
    background-color: white;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
    transition: right 0.3s ease;
    z-index: 1001; /* On top of the overlay */
    padding: 20px;
    box-sizing: border-box;
}

.close-button {
    background: none;
    border: none;
    font-size: 24px;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    color: #000;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    z-index: 1000;
}

.overlay.active {
    opacity: 1;
    visibility: visible;
    backdrop-filter: blur(5px);
}

.sidebar.active {
    right: 0;
}
.search-wrap{
    position: relative;
}
.search-wrap svg{
    position: absolute;
    top: 9px;
    right: 10px;
    cursor: pointer;
}

</style>
</br>
<section class="ftco-section">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-8 order-md-last">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a class="navbar-brand" href="{{ url('/') }}">BLACKBEIGER<sup>&#x1F12C</sup></a>
                    </div>
                    <div class="col-md-6 d-flex  mb-3">
                        
                        <form action="#" class="searchform order-lg-last">
                            <div class="form-group d-flex">
                                <div class="search-wrap d-flex" style="background-color: white ">
                                    <input type="text" class="form-control " placeholder="Search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </div> 
                            </div>
                        </form>
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg> --}}
                          <div id="cartButton-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                 class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-youtube"><i class="sr-only">Youtube</i></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>


            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    @if (getCategories()->isNotEmpty())
                        @foreach (getCategories() as $category)
                            <li class="nav-item">
                                <a href="{{ url('/get-collection/' . $category->slug) }}"
                                    class="nav-link">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            {{-- @if (getCategories()->isNotEmpty())
      @foreach (getCategories() as $category)
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a href="{{ url('/get-collection/' . $category->id) }}" class="nav-link">{{$category->name}}</a>
            </li>
        </ul>
      </div>
      @endforeach
      @endif --}}



        </div>
    </nav>
    <div id="overlay" class="overlay"></div>

    <div id="sidebar" class="sidebar">
        <button id="closeButton" class="close-button">&times;</button>
        <h2>Shopping Cart</h2>
        <p>Your cart is empty.</p>
    </div>
    <script>
        document.getElementById('cartButton-wrap').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('overlay').classList.toggle('active');
    });

    document.getElementById('overlay').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('active');
        document.getElementById('overlay').classList.remove('active');
    });

    document.getElementById('closeButton').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('active');
        document.getElementById('overlay').classList.remove('active');
    });

        </script>
    <!-- END nav -->
</section>
