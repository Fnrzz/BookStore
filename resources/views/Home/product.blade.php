@extends('Home.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/" class="shadow-sm">
                    <span class="badge text-bg-info text-white"><i class="bi bi-arrow-left-circle"></i> Back</span>
                </a>
            </div>
        </div>
    </div>
    <section id="product" style="padding-top: 3rem;">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                <div class="col text-center">
                    <div data-aos="fade-right">
                        @if ($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid img-thumbnail shadow" width="50%" alt="{{ $product->image }}">
                        @else
                            <img src="{{ asset('assets/book1.jpg') }}" class="img-fluid img-thumbnail shadow" width="50%" alt="book1.jpg">
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div data-aos="fade-left">
                        <h3>{{ $product->title }}</h3>
                        <h6 class="mb-3">Category: <b class="c1">{{ $product->category->name }}</b></h6>
                        {!! $product->body !!}
                        <h6 class="mt-3">Price: <b class="text-success">Rp. {{ number_format($product->price) }}</b></h6>
                        <div class="d-grid">
                            <a href="/transaction-product/{{ $product->slug }}" class="btn btn-success mt-5">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection