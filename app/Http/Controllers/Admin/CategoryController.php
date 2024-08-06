<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::latest();

        if(!empty($request->get('keyword'))){

            $categories = $categories->where('name', 'like', '%'.$request->get('keyword').'%');
        }

        $categories = $categories->paginate(10);
        return view('admin.category.list', compact('categories'));
    }
    
    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            't_products' => 'required|integer',
        ]);
        if($validator->passes()){
            $category = new Category();
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->image = $request->input('image');
            $category->t_products = $request->input('t_products');
            $category->status = $request->input('status');
            $category->showHome = $request->input('showHome');
            $category->showImage = $request->input('showImage');

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/category'), $imageName);
                $category->image = 'images/category/' . $imageName;
            }
            $category->save();

            $request->session()->flash('success','Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category added successfully'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($categoryId, Request $request){        
        $category = Category::find($categoryId);
        if(empty($category)){
            return redirect()->route('categories.index');
        }

        return view('admin.category.edit', compact('category'));
    }

    // public function update($categoryId, Request $request){

    //     $category = Category::find($categoryId);
    //     if(empty($category)){
    //         $request->session()->flash('error','Category not found');

    //         return response()->json([
    //             'status' => false,
    //             'NotFound' => true,
    //             'message' => 'Category not found'
    //         ]);
    //     }


    //     $validator = Validator::make($request->all(),[
    //         'name' => 'required',
    //         'slug' => 'required|unique:categories,slug,'.$category->id.',id',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
    //         't_products' => 'required|integer',
    //     ]);
    //     if($validator->passes()){
    //         $category->name = $request->input('name');
    //         $category->slug = $request->input('slug');
    //         $category->t_products = $request->input('t_products');
    //         $category->status = $request->input('status');
    //         $category->showHome = $request->input('showHome');
    //         $category->save();

    //         $request->session()->flash('success','Category updated successfully');

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Category updated successfully'
    //         ]);

    //     }else{
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors()
    //         ]);
    //     }
    // }
    public function update(Request $request)
    {
        $category = Category::find($request->categoryId);
        if (empty($category)) {
            $request->session()->flash('error', 'Category not found');

            return response()->json([
                'status' => false,
                'NotFound' => true,
                'message' => 'Category not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id . ',id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            't_products' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->t_products = $request->input('t_products');
            $category->status = $request->input('status');
            $category->showHome = $request->input('showHome');
            $category->showImage = $request->input('showImage');

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/category'), $imageName);
                $category->image = 'images/category/' . $imageName;
            }

            $category->save();

            $request->session()->flash('success', 'Category updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($categoryId, Request $request){
        $category = Category::find($categoryId);
        if(empty($category)){
            $request->session()->flash('error','Category not found');
            return response()->json([
                'status' => true,
                'message' => 'Category not found'
            ]);
            // return redirect()->route('categories.index');
        }
        $category->delete();
        
        $request->session()->flash('success','Category deleted successfully');
        
        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully'
        ]);
    }
    public function getCollecitonData ($collectionId) {
        // dd($collectionId);
    }
}    
