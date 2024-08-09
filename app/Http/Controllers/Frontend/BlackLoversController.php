<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlackLoversController extends Controller
{
    public function index(){
        
        // Find the category with the slug 'heels'
        $heelsCategory = Category::where('slug', 'black-lovers')->firstOrFail();

        // Get all products that belong to the 'heels' category
        $products = $heelsCategory->products()->get();

        return view('frontend.black-lovers', compact('products'));
    }
}    