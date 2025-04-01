<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .order-container {
            margin: 50px auto;
            max-width: 900px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-table th,
        .order-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .order-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .order-table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .progress-bar-container {
            margin-top: 10px;
        }

        .progress-bar {
            width: 100%;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            height: 20px;
        }

        .progress-bar-fill {
            height: 100%;
            text-align: center;
            line-height: 20px;
            color: #fff;
            font-size: 14px;
        }

        .progress-bar-fill.pending {
            width: 33%;
            background-color: #dc3545; /* Red for Pending */
        }

        .progress-bar-fill.otw {
            width: 66%;
            background-color: #ffc107; /* Yellow for On The Way */
        }

        .progress-bar-fill.delivered {
            width: 100%;
            background-color: #28a745; /* Green for Delivered */
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

    <div class="container">
        <div class="order-container">
            <h2>Your Orders</h2>

            @if(count($orders) > 0)
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->product->title }}</td>
                        <td>${{ $order->product->price }}</td>
                        <td>
                            <img src="{{ $order->product->image ? asset('products/' . $order->product->image) : asset('images/placeholder.png') }}" alt="Product Image">
                        </td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <div class="progress-bar-container">
                                <div class="progress-bar">
                                    <div class="progress-bar-fill 
                                        @if($order->status == 'Pending') pending 
                                        @elseif($order->status == 'On the way') otw 
                                        @elseif($order->status == 'Delivered') delivered 
                                        @endif">
                                        {{ $order->status }}
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p style="text-align: center; font-size: 18px; color: #888;">You have no orders yet. <a href="{{ route('shop') }}">Shop now</a>.</p>
            @endif
        </div>
    </div>

    <!-- info section -->
    @include('home.info')
    <!-- end info section -->

    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>