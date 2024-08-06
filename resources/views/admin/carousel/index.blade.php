@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Carousel</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('carousel.create')}}" class="btn btn-primary">New Carousel</a>
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
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th width="60">ID</th>
                        <th>Image</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($images->isNotEmpty())
                    @foreach ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td><img src="{{ asset($image->image_path) }}" alt="Image" width="100"></td>
                        <td>
                            <a href="{{ route('carousel.edit', $image->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('carousel.destroy', $image->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3">No Images Found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('customJs')

@endsection