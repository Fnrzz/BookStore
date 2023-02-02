@extends('Home.layouts.layout')

@section('content')
    {{-- Heading --}}
    <section id="heading">
        @if (session()->has('success'))    
        <div class="toast-container position-fixed bottom-0 end-0 p-3" >
          <div  class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
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
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 align-items-center">
                <div class="col text-center">
                    <h1>Let's Read <b class="c1">Books</b></h1>
                </div>
                <div class="col">
                    <img src="{{ asset('assets/heading.gif') }}" alt="heading.gif" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    {{-- Akhir Heading --}}

    {{-- Features --}}
    <section id="features" style="padding-top: 3rem">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h3>Features</h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 mt-3 g-4">
                @foreach ($features as $feature)
                    <div class="col d-flex justify-content-center">
                        <div class="card shadow-sm" data-aos="fade-up" data-aos-duration="2000" style="width: 18rem;">
                            <div class="card-body text-center">
                                <div class="kotak rounded-circle mb-3 shadow">
                                    <div class="row">
                                        <div class="col mt-4">
                                            <i class="bi {{ $feature->icon }} fs-1 fw-bolder"></i>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title">{{ $feature->title }}</h5>
                                <p class="card-text">{{ $feature->text }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Akhir Features --}}

    {{-- Products --}}
    <section id="products" style="padding-top: 5rem;">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h3>Products :</h3>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-4 g-3 mt-4 justify-content-center">
                @foreach ($products as $product)
                    <div class="col">
                        <a href="/product/{{ $product->slug }}" class="text-decoration-none text-dark">
                            <div class="card shadow-sm" >
                                <div class="card-body text-center">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid" width="90%" alt="{{ $product->image }}">
                                    @else
                                        <img src="{{ asset('assets/book1.jpg') }}" class="img-fluid" width="90%" alt="book1.jpg">
                                    @endif
                                    <h5 class="card-title fw-bold mt-2">{{ $product->title }}</h5>
                                    <h6 class="card-subtitle mb-2 c1">{{ $product->category->name }}</h6>
                                    <p class="card-text">{{ $product->excerpt }}</p>
                                    <h5 class="card-subtitle mb-3 text-success fw-bold">Rp. {{ number_format($product->price) }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>    
                @endforeach
            </div>
            <div class="row text-center pt-5">
                <div class="col">
                    <a href="/products" class="text-decoration-none ">View All</a>
                </div>
            </div>
        </div>
    </section>
    {{-- Akhir Products --}}
@endsection