<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselImage;
use Illuminate\Http\Request;

class CarouselImageController extends Controller
{
    public function index()
    {
        $images = CarouselImage::all();
        return view('admin.carousel.index', compact('images'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/carousel'), $imageName);

        CarouselImage::create(['image_path' => 'images/carousel/'.$imageName]);

        return redirect()->route('carousel.index')->with('success', 'Image uploaded successfully.');
    }

    public function edit(CarouselImage $carouselImage)
    {
        return view('admin.carousel.edit', compact('carouselImage'));
    }

    public function update(Request $request, CarouselImage $carouselImage)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,webp,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            if (file_exists(public_path($carouselImage->image_path))) {
                unlink(public_path($carouselImage->image_path));
            }

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/carousel'), $imageName);

            $carouselImage->update(['image_path' => 'images/carousel/'.$imageName]);
        }

        return redirect()->route('carousel.index')->with('success', 'Image updated successfully.');
    }

    // Destroy method
    public function destroy(CarouselImage $carouselImage)
    {
        // Delete the image file
        if (file_exists(public_path($carouselImage->image_path))) {
            unlink(public_path($carouselImage->image_path));
        }

        $carouselImage->delete();
        return redirect()->route('carousel.index')->with('success', 'Image deleted successfully.');
    }

}
