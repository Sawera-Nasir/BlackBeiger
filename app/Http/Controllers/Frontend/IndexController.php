<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CarouselImage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $images = CarouselImage::all();
        return view('frontend.index', compact('images'));
    }
}
