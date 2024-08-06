<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CarouselImageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
// use App\Http\Controllers\Admin\TempImagesController;
// use App\Http\Controllers\Admin\ProductImageController;
use Illuminate\Http\Request;


use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\AccessoriesController;
use App\Http\Controllers\Frontend\BlackLoversController;
use App\Http\Controllers\Frontend\EverydayValueController;
use App\Http\Controllers\Frontend\CelebrityClosetController;
use App\Http\Controllers\Frontend\FlatsController;
use App\Http\Controllers\Frontend\HeelsController;
use App\Http\Controllers\Frontend\KhussaController;
use App\Http\Controllers\Frontend\NewArrivalsController;
use App\Http\Controllers\Frontend\ViewAllController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::group(['prefix' => 'admin'],function(){

    Route::group(['middleware' => 'admin.guest'],function(){
        
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');

    });

    Route::group(['middleware' => 'admin.auth'],function(){

        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');

        // Category Routes
        Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
        Route::post('/categories',[CategoryController::class,'update'])->name('categories.update');
        Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.delete');


        //Carousel Routes
        Route::get('/carousel',[CarouselImageController::class,'index'])->name('carousel.index');
        Route::get('carousel/create', [CarouselImageController::class, 'create'])->name('carousel.create');
        Route::post('/carousel', [CarouselImageController::class, 'store'])->name('carousel.store');
        Route::get('carousel/{carouselImage}/edit', [CarouselImageController::class, 'edit'])->name('carousel.edit');
        Route::put('carousel/{carouselImage}', [CarouselImageController::class, 'update'])->name('carousel.update');
        Route::delete('carousel/{carouselImage}', [CarouselImageController::class, 'destroy'])->name('carousel.destroy');




        // Product Routes
        Route::get('/products',[ProductController::class,'index'])->name('products.index');
        Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/products',[ProductController::class,'store'])->name('products.store');
        Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
        Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
        Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.delete');

        // Route::post('/product-images/update',[ProductImageController::class,'update'])->name('product-images.update');
        // Route::delete('/product-images',[ProductImageController::class,'destroy'])->name('product-images.destroy');


        // //temp-images.create
        // Route::get('/upload-images/create',[TempImagesController::class,'create'])->name('temp-images.create');



        
        Route::get('/getSlug',function(Request $request){
            $slug = '';
            if(!empty($request->title)){
                $slug = Str::slug($request->title);
            }

            return response()->json([
                'status' => true,
                'slug' => $slug
            ]);
            return view('admin.category.slug');
        })->name('getSlug');
    });


});

Route::get('/',[IndexController::class,'index'])->name('frontend.index');
Route::get('/get-collection/{slug}', [CategoryController::class, 'getCollectionData'])->name('get.collection');

Route::get('/black-lovers',[BlackLoversController::class,'index']);
Route::get('/everyday-value',[EverydayValueController::class,'index']);
Route::get('/celebrity-closet',[CelebrityClosetController::class,'index']);
Route::get('/accessories',[AccessoriesController::class,'index']);
Route::get('/flats',[FlatsController::class,'index']);
Route::get('/heels',[HeelsController::class,'index']);
Route::get('/khussa',[KhussaController::class,'index']);
Route::get('/new-arrivals',[NewArrivalsController::class,'index']);
Route::get('/view-all',[ViewAllController::class,'index']);
Route::get('/get-collection/{collectionId}',[CategoryController::class,'getCollecitonData'])->name('get.collection');