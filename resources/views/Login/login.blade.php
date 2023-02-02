@extends('Login.layouts.layout')

@section('content')
    <section id="login" style="padding-top: 2rem;padding-bottom:3rem">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow" data-aos="fade-left">
                        <div class="card-body">
                          <h3 class="text-center mb-3">Book<b class="c1" >Store</b></h3>
                          <form action="/login" method="POST" >
                            @csrf
                            <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('name') }}">
                              @error('email')    
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror          
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                <i class="bi bi-eye-slash input-group-text bg-white rounded-end" id="see1" onclick="see()"></i>
                                <i class="bi bi-eye input-group-text bg-white d-none rounded-end" id="see2" onclick="see()"></i>          
                                @error('password')    
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror 
                              </div>
                            </div>
                            <div class="mb-3 d-grid">
                              <button type="submit" class="btn btn-info text-white fw-bold">Login</button>
                            </div>
                          </form>
                          <div class="mb-3 text-center">
                              <small>Don't have an account? <a href="/register" class="text-decoration-none c1">Register Now!</a></small>
                          </div>
                        </div>
                    </div>
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
        @if (session()->has('error'))    
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
          <div  class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
            <div class="toast-header">
              <strong class="me-auto">Message</strong>
              <small>Now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              {{ session('error') }}
            </div>
          </div>
        </div>
        @endif
        
    </section>
@endsection