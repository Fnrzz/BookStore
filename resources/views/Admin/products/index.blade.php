@extends('Admin.layouts.layout')

@section('content')
    <section style="padding-top: 2rem">
        <div class="container">
            <div class="row mb-2">
                <div class="col-6">
                    <h5 class="text-muted ">List Products</h5>
                </div>
                <div class="col-6 text-end">
                    <a href="/admin/create-product" class="btn btn-success ">Create Product</a>
                </div>
            </div>
            <hr>
        </div>
        <div class="container pt-3">
            <div class="row mb-3">
                <div class="col">
                    <h6 class="text-muted">Last Product</h6>
                </div>
                <div class="col-md-3 col-6 ms-auto">
                    <form action="/admin/products">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search Book">
                            <button type="submit" class="input-group-text btn btn-success text-white" id="basic-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="card" data-aos="fade-left" >
                    <div class="card-body">
                        @if ($products->count())
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Book</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)    
                                            <tr>
                                                <td>
                                                    <h6>{{ $loop->iteration }}</h6>
                                                </td>
                                                <td>
                                                    <h6>{{ $item->title }}</h6>
                                                    <h6 class="text-muted">{{ $item->category->name }}</h6>
                                                </td>
                                                <td>
                                                    <h6>Rp. {{ number_format($item->price) }}</h6>
                                                </td>
                                                <td>
                                                    <a href="/admin/product-detail/{{ $item->slug }}" class="badge rounded-pill text-bg-primary fs-6">
                                                        <i class="bi bi-archive"></i>
                                                    </a>
                                                    <a href="/admin/product-edit/{{ $item->slug }}" class="badge rounded-pill text-bg-warning fs-6">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="/admin/products/{{ $item->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="badge rounded-pill text-bg-danger fs-6 border-0"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $products->links() }}
                        @else
                            <div class="row">
                                <div class="col text-center">
                                    <h6>products Not Found</h6>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if (session()->has('success'))    
            <div class="toast-container position-fixed bottom-0 end-0 p-3" >
                <div  class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
                    <div class="toast-header">
                        <strong class="me-auto">Message</strong>
                        <small>Now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection