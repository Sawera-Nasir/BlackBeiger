@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Carousel</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('carousel.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>
</section>
<!-- /.content -->
@endsection

@section('customJs')

@endsection
