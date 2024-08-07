<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Helpers\Helper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::latest('id');

        if($request->get('keyword') !=""){
            $products = $products->where('title', 'like', '%'.$request->keyword.'%');
        }

        $products = $products->paginate();
        $data['products'] = $products;
        return view('admin.products.list', $data);
    }


    public function create(){
        $data = [];
        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        return view('admin.products.create', $data);
    }

    public function store(Request $request){

        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:products',
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif|max:2048', // Validate image file
            'price' => 'required|numeric',
            'sku' => 'required|unique:products',
            'track_qty' => 'required|in:Yes,No',
            'category_id' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
            'sizes' => 'required|array',
            'sizes.*' => 'in:36,37,38,39,40,41,42',
        ];

        // if ($request->hasFile('image')) {
        //     $data['image'] = Helper::handleImageUpload($request->file('image'));
        // }

            if(!empty($request->track_qty) && $request->track_qty == 'Yes'){
                $rules['qty'] = 'required|numeric';
            }

        $validator = Validator::make($request->all(),$rules);
        $validatedData['sizes'] = implode(',', $request->input('sizes', []));

        if ($validator->passes()) {
            $product = new Product;
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->image = $request->image;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->discount = $request->discount;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->productSection = $request->productSection;
            $product->sizes = implode(',', $request->sizes);
            $product->category_id = $request->category_id;
            $product->is_featured = $request->is_featured;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/product'), $imageName);
                $product->image = 'images/product/' . $imageName;
            }

            // Calculate discount if compare_price is provided
            if ($request->filled('compare_price') && $request->compare_price > $request->price) {
                $data['discount'] = round((($request->compare_price - $request->price) / $request->compare_price) * 100, 2);
            } else {
                $data['discount'] = 0;
            }

            $product->save();



            session()->flash('success','Product added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Product added successfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    public function edit($id, Request $request){

        $product = Product::find($id);

        if(empty($product)){
            return redirect()->route('products.index')->with('error','Product not found');
        }



        $data = [];
        $data['product'] = $product;
        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        // $data['productImages'] = $productImages;
        return view('admin.products.edit',$data);
    }



    public function update($id, Request $request){
        $product = Product::find($id);

        $rules = [
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$product->id.',id',
            'image' => 'nullable|image|mimes:jpeg,webp,png,jpg,gif|max:2048', // Validate image file
            'price' => 'required|numeric',
            'sku' => 'required|unique:products,sku,'.$product->id.',id',
            'track_qty' => 'required|in:Yes,No',
            'category_id' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
            'sizes' => 'required|array',
            'sizes.*' => 'in:36,37,38,39,40,41,42',
        ];

            // if ($request->hasFile('image')) {
            //     $data['image'] = Helper::handleImageUpload($request->file('image'));
            // }

            if(!empty($request->track_qty) && $request->track_qty == 'Yes'){
                $rules['qty'] = 'required|numeric';
            }

        $validator = Validator::make($request->all(),$rules);
        $validatedData['sizes'] = implode(',', $request->input('sizes', []));

        if ($validator->passes()) {
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->image = $request->image;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->discount = $request->discount;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->productSection = $request->productSection;
            $product->sizes = implode(',', $request->sizes);
            $product->category_id = $request->category_id;
            $product->is_featured = $request->is_featured;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/product'), $imageName);
                $product->image = 'images/product/' . $imageName;
            }

            // Calculate discount if compare_price is provided
            if ($request->filled('compare_price') && $request->compare_price > $request->price) {
                $data['discount'] = round((($request->compare_price - $request->price) / $request->compare_price) * 100, 2);
            } else {
                $data['discount'] = 0;
            }

            $product->save();


            //session()->flash('success','Product updated successfully');

            return redirect()->route('products.index')->with('success','Product updated successfully');

            // return response()->json([
            //     'status' => true,
            //     'message' => 'Product updated successfully',
            // ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }



    public function destroy($id, Request $request){
        $product = Product::find($id);
        if(empty($product)){
            $request->session()->flash('error','Product not found');
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
            // return redirect()->route('products.index');
        }
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }
        // $productImages = ProductImage::where('product_id',$id)->get();
        // if(!empty($productImages)){
        //     foreach ($productImages as $productImage) {
        //         File::delete(public_path('uploads/product/large/'.$productImage->image));
        //         File::delete(public_path('uploads/product/small/'.$productImage->image));
        //     }

        //     ProductImage::where('product_id',$id)->delete();

        // }
        $product->delete();

        $request->session()->flash('success','Product deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully'
        ]);        
    }

}
