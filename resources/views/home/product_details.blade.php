<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .product-details-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .product-details-container .img-box img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-details-container .details-box {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-details-container .details-box h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product-details-container .details-box p {
            font-size: 16px;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .product-details-container .details-box .price {
            font-size: 20px;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 20px;
        }

        .product-details-container .details-box .category,
        .product-details-container .details-box .quantity {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-details-container .details-box .btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
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

    <!-- product details start -->
    <section class="product-details-container layout_padding">
        <div class="container">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ $product->image ? asset('products/' . $product->image) : asset('images/placeholder.png') }}" alt="Product Image">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-6">
                    <div class="details-box">
                        <h2>{{ $product->title }}</h2>
                        <p class="description">{{ $product->description }}</p>
                        <p class="price">Price: ${{ $product->price }}</p>
                        <p class="category">Category: {{ $product->category }}</p>
                        <p class="quantity">Available Quantity: {{ $product->quantity }}</p>

                        <!-- Add to Cart Button -->
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product details end -->

    <!-- info section -->
    @include('home.info')
    <!-- end info section -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>