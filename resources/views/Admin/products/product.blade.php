@extends('Home.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/admin/products" class="shadow-sm">
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
                        @if ($products->image)
                            <img src="{{ asset('storage/'.$products->image) }}" class="img-fluid img-thumbnail shadow" width="50%" alt="{{ $products->image }}">
                        @else
                            <img src="{{ asset('assets/book1.jpg') }}" class="img-fluid img-thumbnail shadow" width="50%" alt="book1.jpg">
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div data-aos="fade-left">
                        <h3>{{ $products->title }}</h3>
                        <h6 class="mb-3">Category: <b class="c1">{{ $products->category->name }}</b></h6>
                        {!! $products->body !!}
                        <h6 class="mt-3">Price: <b class="text-success">Rp. {{ number_format($products->price) }}</b></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection