@extends('dashboard.layout.app')
@section('content')
<div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="container-fluid">
    </div>
    <h4 class="card-title">Product form</h4>
        <form class="forms-sample" action="{{route("admin.products.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
        </div>
        <div class="form-group">
            <label>Product Image</label>
            <div class="form-group">
                <input type="file" id="image" name="image">
            </div>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <div class="form-group">
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="price">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="description">
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
    </form>
</div>
@endsection
