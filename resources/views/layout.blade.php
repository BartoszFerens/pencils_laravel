<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- CSS here -->
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart">Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login">Login</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="login">Login</a>
                <a class="dropdown-item" href="cart">Cart</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="checkout">Checkout</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <!-- Cart -->
          <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </button>
            <div class="dropdown-menu">
                <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </div>
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                    </div>
                </div>
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="/images/shop/{{ $details['image'] }}" />
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p>{{ $details['name'] }}</p>
                                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of cart -->
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

<br/>
<div class="container">
  
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
  
    @yield('content')
</div>
  
@yield('scripts')
     
</body>
</html>