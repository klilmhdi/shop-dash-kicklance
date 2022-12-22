@extends('dashboard.layout.app')
@section('content')
    <div class="card">
        @if (session()->has('message'))
            <div class="alert-success p-3">{{ session()->get('message') }}</div>
        @endif
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Products Items</h6>
                <a href="{{ route('admin.products.create') }}"><button type="button"
                        class="btn btn-outline-dark btn-fw">Create</button></a>
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
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Price</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ asset('/storage/' . $product->image) }}"alt="{{ $product->name }}"
                                                    height="100" width="100"></td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <th>
                                                <dr>
                                                    <a href="{{ route('admin.products.edit', $product->id) }}">
                                                        <button type="submit"
                                                            class="btn btn-inverse-primary btn-rounded btn-icon">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>
                                                    </a>
                                                </dr>
                                                <hr>
                                                <dr>
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-rounded btn-icon">
                                                            <i class="mdi mdi-delete btn-icon-prepend"></i>
                                                        </button>
                                                    </form>
                                                </dr>
                                            </th>
                                        </tr>
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
