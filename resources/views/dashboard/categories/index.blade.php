@extends('dashboard.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Category Items</h6>
                <a href="{{ route('admin.categories.create') }}"><button type="button"
                        class="btn btn-outline-dark btn-fw">Create</button></a>
            </div>
            <div class="table-responsive">
                <div id="recent-purchases-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table dataTable no-footer" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>Category Name</th>
                                        {{-- <th>Category Image</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $catgory)
                                        <tr>
                                            <td>{{ $catgory->name }}</td>
                                            {{-- <td>{{$catgory->image}}</td> --}}
                                            <td>
                                                <dr>
                                                    <a href="{{ route('admin.categories.edit', $catgory->id) }}">
                                                        <button type="submit"
                                                            class="btn btn-inverse-primary btn-rounded btn-icon">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>
                                                    </a>
                                                </dr>
                                                <hr>
                                                <dr>
                                                    <form action="{{ route('admin.categories.destroy', $catgory->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                            <i class="mdi mdi-delete btn-icon-prepend"></i>
                                                        </button>
                                                    </form>
                                                </dr>
                                            </td>
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
