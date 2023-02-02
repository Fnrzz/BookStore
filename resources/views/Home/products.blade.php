@extends('Home.layouts.layout')

@section('content')
    <section id="allProducts" style="padding-top: 3rem">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>All Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-6 ms-auto">
                    <form action="/products">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Book" name="search" value="{{ request('search') }}">
                            <button type="submit" class="input-group-text btn btn-success text-white" id="basic-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            @if ($products->count())    
                <div class="row row-cols-2 row-cols-md-4 g-3 mt-4 justify-content-center">
                    @foreach ($products as $product)
                        <div class="col" >
                            <a href="/product/{{ $product->slug }}" class="text-decoration-none text-dark">
                                <div class="card shadow-sm" >
                                    <div class="card-body text-center">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" width="90%" alt="{{ $product->image }}">
                                        @else
                                            <img src="{{ asset('assets/book1.jpg') }}" class="img-fluid" width="90%" alt="book1.jpg">
                                        @endif
                                        <h5  class="card-title mt-2 fw-bold ">{{ $product->title }}</h5>
                                        <h6 class="card-subtitle mb-2 c1">{{ $product->category->name }}</h6>
                                        <p class="card-text">{{ $product->excerpt }}</p>
                                        <h5 class="card-subtitle mb-3 text-success fw-bold">Rp. {{ number_format($product->price) }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>    
                    @endforeach
                </div>
            @else
                <div class="row mt-5">
                    <div class="col text-center">
                        <h6>Product Not Found</h6>
                    </div>
                </div>
            @endif
            <div class="row pt-5">
                <div class="col">
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection