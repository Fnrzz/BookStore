@extends('Admin.layouts.layout')

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
    <section id="create" style="padding-top: 3rem">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <h5>Create Product</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="/admin/create-product" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ old('slug') }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Book Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Book Category</label>
                            <select class="form-select" name="category_id">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                    @if (old('category_id') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <img class="img-preview img-fluid mb-3 " width="30%">
                            <input class="form-control @error('image') is-invalid @enderror" onchange="previewImage()" type="file" id="image" name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Book Description</label>
                            <input type="hidden" class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="{{ old('body') }}" ></input>
                            @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <trix-editor input="body"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
@endsection