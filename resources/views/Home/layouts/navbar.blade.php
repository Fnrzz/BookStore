<nav class="navbar navbar-expand-lg">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Book <b class="c1">Store</b></span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center text-center">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#products">Products</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><h6 class="dropdown-header">User Menu</h6></li>
              @auth  
                @if (auth()->user()->name === "admin")  
                  <li><a class="dropdown-item " href="/admin">{{ auth()->user()->username }}</a></li>
                @else
                  <li><a class="dropdown-item " href="/dashboard">{{ auth()->user()->username }}</a></li>
                @endif  
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                  </form>
                </li>
              @else
                <li><a class="dropdown-item" href="/login">Login</a></li>
              @endauth
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>