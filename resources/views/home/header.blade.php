<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.html">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.html">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.html">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
          @if (Route::has('login'))
            
            @auth 
            <a class="nav-link" href="{{url('view_orders')}}">
              <i class="fa fa-clipboard" aria-hidden="true"></i> View Orders
            </a>

            <a href="{{url('view_cart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              [{{$count}}]
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
              @csrf
              <button type="submit" class="nav-link" style="background: none; border: none; color: inherit; padding: 0; cursor: pointer;">
                Logout
              </button>
            </form>
            @else 
              <a href="{{url('/login')}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Login
                </span>
              </a>
              <a href="{{url('/register')}}">
                <i class="fa fa-vcard" aria-hidden="true"></i>
                <span>
                  Register
                </span>
              </a>
              @endauth
            @endif
            <!--
<form class="form-inline ">
  <button class="btn nav_search-btn" type="submit">
    <i class="fa fa-search" aria-hidden="true"></i>
  </button>
</form>
-->
          </div>
        </div>
      </nav>
    </header>