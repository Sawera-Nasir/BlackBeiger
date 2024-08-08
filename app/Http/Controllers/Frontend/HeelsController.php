<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeelsController extends Controller
{
    public function index()
    {
        // return view('frontend.heels');
        
        // Find the category with the slug 'heels'
        $heelsCategory = Category::where('slug', 'heels')->firstOrFail();

        // Get all products that belong to the 'heels' category
        $products = $heelsCategory->products()->with('sizes')->get();

        return view('frontend.index', compact('products'));
    }
}
