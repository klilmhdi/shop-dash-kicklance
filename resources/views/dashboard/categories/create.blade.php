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
    <h4 class="card-title">Category form</h4>
    <div><br></div>
    <form class="forms-sample" action="{{route('admin.categories.store')}}" method="Post">
        @csrf
        <div class="form-group">
            <label for="exampleInputUsername1">Category Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name">
        {{-- </div>
        <div class="form-group">
            <label>Category Image</label>
            <input type="file" id="image" name="image">
        </div> --}}
        <button type="submit" class="btn btn-primary me-2">Submit</button>
    </form>
</div>
@endsection
