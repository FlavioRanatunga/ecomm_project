<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: center;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .empty-cart {
            text-align: center;
            font-size: 20px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->

    <!-- cart details start -->
    <div class="container">
        @if(count($cart) > 0)
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            @foreach($cart as $cart)
            <tr>
                <td>{{ $cart->product->title }}</td>
                <td>${{ $cart->product->price }}</td>
                <td>
                    <img src="{{ $cart->product->image ? asset('products/' . $cart->product->image) : asset('images/placeholder.png') }}" alt="Product Image">
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <p class="empty-cart">Your cart is empty. <a href="{{ route('shop') }}">Shop now</a>.</p>
        @endif
    </div>
    <!-- cart details end -->

    <!-- info section -->
    @include('home.info')
    <!-- end info section -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>