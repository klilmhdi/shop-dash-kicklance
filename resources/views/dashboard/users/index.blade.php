@extends('dashboard.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Users</h6>
                <a href="{{ route('admin.users.create') }}">
                    <button type="button" class="btn btn-outline-dark btn-fw">Create</button>
                </a>
            </div>
            <div class="table-responsive">
                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table dataTable no-footer" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>Number</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{ $user->id }}</th>
                                            <th>{{ $user->name }}</th>
                                            <th>{{ $user->email }}</th>
                                            <th>{{ $user->created_at }}</th>
                                            <th>{{ $user->updated_at }}</th>
                                            <th>
                                                <dr>
                                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                                        <button type="submit"
                                                            class="btn btn-inverse-primary btn-rounded btn-icon">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>
                                                    </a>
                                                </dr>
                                                @if (Auth::user()->id != $user->id)
                                                    <hr>
                                                    <dr>
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-rounded btn-icon">
                                                                <i class="mdi mdi-delete btn-icon-prepend"></i>
                                                            </button>
                                                        </form>
                                                    </dr>
                                                @endif
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5"></div>
                        <div class="col-sm-12 col-md-7"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
