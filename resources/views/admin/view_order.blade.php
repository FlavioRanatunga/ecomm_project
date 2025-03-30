<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: center;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
            text-transform: uppercase;
        }

        table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .page-header {
            margin-bottom: 20px;
        }

        .page-header h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2>Order Details</h2>
        </div>
      </div>
      <div class="container-fluid">
        <table>
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Status</th>
              <th>Change status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order as $order)
            <tr>
              <td>{{ $order->name }}</td>
              <td>{{ $order->rec_address }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->product->title }}</td>
              <td>{{ $order->product->price }}</td>
              <td>
                <img src="{{ $order->product->image ? asset('products/' . $order->product->image) : asset('images/placeholder.png') }}" alt="Product Image">
              </td>
              <td>{{ $order->status }}</td>
              <td>
                <a class="btn btn-primary" href="{{url('status_otw', $order->id)}}">
                    On The way
                </a>
                <a class="btn btn-success" href="{{url('status_del', $order->id)}}">
                    Delivered
                </a>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>