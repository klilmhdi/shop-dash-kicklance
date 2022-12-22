@extends('dashboard.layout.app')
@section('content')
    <div class="card-body">
        <div class="container-fluid">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <h4 class="card-title">Edit Category</h4>
        <div><br></div>
        <form class="forms-sample" action="{{route('admin.categories.update', $categories->id)}}" method="Post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputUsername1">Category Name</label>
                <input type="text" id="name" name="name" placeholder="{{old('name', $categories->name)}}">
            </div>
            {{-- <div class="form-group">
                <label for="exampleInputImage1">Category Image</label>
                <input type="file" id="image">
            </div> --}}
            <button type="submit" class="btn btn-primary me-2">Submit</button>
        </form>
    </div>
@endsection
