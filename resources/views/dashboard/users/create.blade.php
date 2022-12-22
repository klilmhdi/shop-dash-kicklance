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
        <h4 class="card-title">Create User form</h4>
        <br>
        <form action="{{route("admin.users.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password"
                       required>
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
@endsection
