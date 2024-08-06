<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CarouselImage;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $images = CarouselImage::all();

        $categories = Category::where('showImage', 'Yes')->get();

        return view('frontend.index', compact('images', 'categories'));
    }
    
}
