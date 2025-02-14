@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('products.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ route('products.update', $product->id) }}" method="post" name="productForm" id="productForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$product->title}}">
                                            <p class="error"></p>	
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Slug</label>
                                            <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{$product->slug}}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"> value="{{$product->description}}"</textarea>
                                        </div>
                                    </div>                                            
                                </div>
                            </div>	                                                                      
                        </div>
                        {{-- <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>								
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">    
                                        <br>Drop files here or click to upload.<br><br>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="product-gallery">
                            @if ($productImages->isNotEmpty())
                                @foreach ($productImages as $image)
                                <div class="col-md-3" id="image-row-{{$image->id}}">
                                    <div class="card">
                                        <input type="hidden" name="image_array[]" value="{{$image->id}}">
                                        <img src="{{asset('uploads/product/small/'.$image->image)}}" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <a href="javascript:void(0)" onclick="deleteImage({{$image->id}})" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div> --}}
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="image">Image</label></br>
                                            <input type="file" id="image" name="image"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{$product->price}}">
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{$product->compare_price}}">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                            </p>	
                                        </div>
                                        <div class="mb-3">
                                            <label for="discount">Discount (%)</label>
                                            <input type="number" name="discount" id="discount" class="form-control" placeholder="Discount percentage">
                                        </div>
                                    </div>                                            
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>								
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{$product->sku}}">	
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{$product->barcode}}">	
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="hidden" name="track_qty" value="No">
                                                <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" {{($product->track_qty == 'Yes')? 'checked' : ''}}>
                                                <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                                <p class="error"></p>	
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty" value="{{$product->qty}}">
                                            <p class="error"></p>
                                        </div>
                                    </div>                                         
                                </div>
                            </div>	                                                                      
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option {{($product->status == 1)? 'selected' : ''}} value="1">Active</option>
                                        <option {{($product->status == 0)? 'selected' : ''}} value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="col-mb-3">
                                <div class="card-body">
                                    <h2 class="h4  mb-3">Product Section</h2>
                                    <div class="mb-3">
                                        <label for="productSection">Section</label>
                                        <select name="productSection" id="productSection" class="form-control">
                                            <option value="None">None</option>
                                            <option value="Trending">Trending</option>
                                            <option value="Trending Products">Trending Products</option>
                                            <option value="Heels">Heels</option>
                                            <option value="Flats">Flats</option>
                                            <option value="Khussa">Khussa</option>
                                        </select> 
                                    </div>       
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Sizes</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="sizes">Sizes</label>
                                            <p class="error"></p>
                                            @php
                                                $sizes = ['36', '37', '38', '39', '40', '41', '42'];
                                                $selectedSizes = is_array($product->sizes) ? $product->sizes : explode(',', $product->sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="sizes[]" value="{{ $size }}" id="size{{ $size }}" {{ in_array($size, $selectedSizes) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="size{{ $size }}">{{ $size }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="sizes">Sizes</label>
                                            <p class="error"></p>	
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="36" id="size36">
                                                <label class="form-check-label" for="size36">36</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="37" id="size37">
                                                <label class="form-check-label" for="size37">37</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="38" id="size38">
                                                <label class="form-check-label" for="size38">38</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="39" id="size39">
                                                <label class="form-check-label" for="size39">39</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="40" id="size40">
                                                <label class="form-check-label" for="size40">40</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="41" id="size41">
                                                <label class="form-check-label" for="size41">41</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="42" id="size42">
                                                <label class="form-check-label" for="size42">42</label>
                                            </div>
                                        </div> --}}
                                    </div>                                         
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="card">
                            <div class="card-body">	
                                <h2 class="h4  mb-3">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">Select a Category</option>
                                        @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                        <option {{($product->category_id == $category->id)? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        @endif

                                        {{-- @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                            <option {{($product->category_id == $category_id)? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif --}}
                                    </select>
                                    <p class="error"></p>	
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control">
                                        <option {{($product->is_featured == 'No')? 'selected' : ''}} value="No">No</option>
                                        <option {{($product->is_featured == 'Yes')? 'selected' : ''}} value="Yes">Yes</option>                                                
                                    </select>
                                    <p class="error"></p>	
                                </div>
                            </div>
                        </div>                                 
                    </div>
                </div>
                
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('products.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customJs')

<script>
    $("#title").change(function(){
        element = $(this);
        $("button[type=submit]").prop('disabled',true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: "get",
            data: {title: element.val()},
            dataType: 'json',
            success: function (response) {
                $("button[type=submit]").prop('disabled',false);
                if (response["status"] == true) {
                    $("#slug").val(response["slug"]);
                }                
            }
        }); 
    });

    
    $("#productForm").submit(function(event){
        // event.preventDefault();
        var formElement = $(this);  // Get the form element
        $("button[type='submit']").prop('disabled',true)
        const formData = new FormData(formElement[0]);  // Use formElement variable here

        $.ajax({
            url: '{{route("products.update",$product->id)}}',
            type: "put",
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // Prevent jQuery from setting the Content-Type request header
            dataType: 'json',
            success: function (response) {
                $("button[type='submit']").prop('disabled',false)
                if (response['status'] == true) {

                    $(".error").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    window.location.href = '{{route("products.index")}}';
                    
                }else{
                    var errors = response['errors'];

                    $(".error").removeClass('invalid-feedback').html('');
                    $("input[type='text'], select, input[type='number']").removeClass('is-invalid');

                    $.each(errors, function(key,value){
                        $(`#${key}`).addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(value);
                    });

                }
                              
            },
            error: function(){
                console.log("Something Went Wrong");
            }
        });            

    });




    // // Initialize Dropzone
    // Dropzone.autoDiscover = false;
    // const dropzone = $("#image").dropzone({
    //     maxFiles: 10,
    //     paramName: 'image',
    //     params: {'product_id': '{{ $product->id }}'}
    //     addRemoveLinks: true,
    //     acceptedFiles: "image/jpeg,image/png,image/gif,image/webp",
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },success : function(file, response){
    //         var html = `<div class="col-md-3" id="image-row-${response.image_id}"><div class="card">
    //             <input type="hidden" name="image_array[]" value="${response.image_id}">
    //             <img src="${response.ImagePath}" class="card-img-top" alt="">
    //             <div class="card-body">
    //                 <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">Delete</a>
    //             </div>
    //         </div></div>`;

    //         $("#product-gallery").append(html);
    //     }
    //     // complete:function(file){
    //     //     this.removeFile(file);
    //     // }
    // }); 

    // function deleteImage(id){
    //     $("#image-row-"+id).remove();
    //     if(confirm("Are you sure you want to delete image? ")){
    //         $.ajax({
    //             type: 'delete',
    //             data: {id: id},
    //             success: function(response){
    //                 if(response.status == true){
    //                     alert(response.message);
    //                 }else{
    //                     alert(response.message);
    //                 }
    //             }
    //         });  
    //     }
    // }


    


</script>
    
@endsection