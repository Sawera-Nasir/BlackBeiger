@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="#" method="post" id="categoryForm" name="categoryForm">
            @csrf
            <input type="hidden" name="categoryId" value="{{ $category->id }}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $category->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $category->slug }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="t_products">t_products</label>
                                <input type="text" name="t_products" id="t_products" class="form-control" placeholder="t_products" value="{{ $category->t_products }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option {{( $category->status == 1 )? 'selected' : ''}} value="1">Active</option>
                                    <option {{( $category->status == 0 )? 'selected' : ''}} value="0">Block</option>
                                </select>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="showHome">Show on Home</label>
                                <select name="showHome" id="showHome" class="form-control">
                                    <option {{( $category->showHome == 'Yes' )? 'selected' : ''}} value="Yes">Yes</option>
                                    <option {{( $category->showHome == 'No' )? 'selected' : ''}} value="No">No</option>
                                </select>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="showImage">Show Image on Home</label>
                                <select name="showImage" id="showImage" class="form-control">
                                    <option {{( $category->showImage == 'Yes' )? 'selected' : ''}} value="Yes">Yes</option>
                                    <option {{( $category->showImage == 'No' )? 'selected' : ''}} value="No">No</option>
                                </select>    
                            </div>
                        </div>     
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>

    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection

@section('customJs')

<script>
    $("#categoryForm").submit(function (event) {
        event.preventDefault();
        var element = $(this);
        // $("button[type=submit]").prop('disabled',true);
        const formData = new FormData(element.get(0));

        $.ajax({
            url: '{{ route("categories.update") }}',
            type: "post",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                $("button[type=submit]").prop('disabled',false);
                if(response["status"] == true){

                    window.location.href="{{ route('categories.index') }}";

                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");

                    $("#slug").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                   
                    $("#t_products").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                        
                }else{
                    if(response['notfound'] == true){
                        window.location.href="{{ route('categories.index')}}";
                    }

                    var errors = response['errors'];
                    if (errors['name']) {
                        $("#name").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['name']);   
                    }else{
                        $("#name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }


                    if (errors['slug']) {
                        $("#slug").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['slug']);
                    }else{
                        $("#slug").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }


                    if (errors['t_products']) {
                        $("#t_products").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['t_products']);   
                    }else{
                        $("#t_products").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }
                }
                

            }, error: function(jqXHR,exception){
                console.log("Something went wrong");
            }
        })
    });

    $("#name").change(function(){
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
    
</script>

@endsection