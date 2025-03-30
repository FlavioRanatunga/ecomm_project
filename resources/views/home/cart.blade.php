<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .cart-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-top: 50px;
        }

        .cart-items {
            flex: 2;
        }

        .order-form {
            flex: 1;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-form h3 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .order-form label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }

        .order-form input,
        .order-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .order-form .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .order-form .btn-primary:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
            text-align: center;
        }

        table th,
        table td {
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

        .total-price {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        .empty-cart {
            text-align: center;
            font-size: 20px;
            color: #888;
            margin-top: 20px;
        }

        .btn-danger {
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
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
        <div class="cart-container">
            <!-- Cart Items Section -->
            <div class="cart-items">
                @if(count($cart) > 0)
                <table>
                    <tr>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Remove</th>
                    </tr>

                    <?php 
                    $value = 0;
                    ?>

                    @foreach($cart as $cart)
                    <tr>
                        <td>{{ $cart->product->title }}</td>
                        <td>${{ $cart->product->price }}</td>
                        <td>
                            <img src="{{ $cart->product->image ? asset('products/' . $cart->product->image) : asset('images/placeholder.png') }}" alt="Product Image">
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{url('delete_cart', $cart->id)}}" onClick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                    <?php 
                    $value += $cart->product->price;
                    ?>
                    @endforeach
                </table>
                <div class="total-price">
                    Total Price: ${{ $value }}
                </div>
                @else
                <p class="empty-cart">Your cart is empty. <a href="{{ url('/dashboard') }}">Shop now</a>.</p>
                @endif
            </div>

            <!-- Order Form Section -->
            <div class="order-form">
                <h3>Place Your Order</h3>
                <form action="{{ url('place_order') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Receiver Name</label>
                        <input type="text" id="name" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div>
                        <label for="address">Receiver Address</label>
                        <textarea id="address" name="address" rows="3">{{Auth::user()->address}}</textarea>
                    </div>
                    <div>
                        <label for="phone">Receiver Phone</label>
                        <input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="Place Order">
                    </div>
                </form>
            </div>
        </div>
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