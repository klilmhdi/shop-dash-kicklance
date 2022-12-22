@extends('dashboard.layout.app')
@section('content')
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h4 class="card-title">Update User Details</h4>
        <br>
        <form action="{{route("admin.users.update", $users->id)}}" method="Post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $users->name)}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email', $users->email)}}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password', $users->password)}}" required>
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
@endsection
