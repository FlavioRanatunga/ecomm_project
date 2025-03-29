<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            <form action="{{ url('search_product') }}" method="GET" style="margin-bottom: 20px;">
              <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search for products..." required>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
              </div>
            </form>
          <h2 style="text-align: center; margin-bottom: 20px;">Product List</h2>
              <table class="table table-bordered table-striped" style="width: 100%; margin: auto; margin-top: 20px;">
                <thead style="background-color: #f8f9fa;">
                  <tr>
                    <th style="text-align: center;">Product Title</th>
                    <th style="text-align: center;">Description</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Category</th>
                    <th style="text-align: center;">Image</th>
                    <th style="text-align: center;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $product)
                  <tr>
                    <td style="text-align: center;">{{ $product->title }}</td>
                    <td style="text-align: center;">{{ $product->description }}</td>
                    <td style="text-align: center;">${{ $product->price }}</td>
                    <td style="text-align: center;">{{ $product->quantity }}</td>
                    <td style="text-align: center;">{{ $product->category }}</td>
                    <td style="text-align: center;">
                    <img 
                      src="{{ $product->image ? asset('products/' . $product->image) : asset('images/placeholder.png') }}" 
                      alt="Product Image" 
                      style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td style="text-align: center;">
                      <a href="{{ url('edit_product', $product->id) }}" class="btn btn-success">Edit</a>
                      <a class="btn btn-danger" href="{{url('delete_product', $product->id)}}" onClick="confirmation(event)">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <div style="margin-top: 20px; text-align: center;">
                  {{ $data->links() }}
              </div>
            </div>
           
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">

    function confirmation(ev){
    ev.preventDefault();

    var urlToRedirect = ev.currentTarget.getAttribute('href'); 

    console.log(urlToRedirect);

    swal({
        title:"Are you sure to delete this category", 
        text: "This delete will be permanent",
        icon: "warning",
        buttons: true,
        dangermode:true,
    })
    .then((willCancel)=>{
        if(willCancel)
    {
        window.location.href=urlToRedirect;
    }
    })
    }
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

