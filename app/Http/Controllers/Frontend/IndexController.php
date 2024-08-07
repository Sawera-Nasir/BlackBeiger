<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CarouselImage;
use App\Models\Category;
use App\Models\Product; 
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $images = CarouselImage::all();

        $categories = Category::where('showImage', 'Yes')->get();
        
        $trendingProducts = Product::where('productSection', 'Trending')->get(); // Fetch trending products

        return view('frontend.index', compact('images', 'categories', 'trendingProducts'));
    }
    
}
