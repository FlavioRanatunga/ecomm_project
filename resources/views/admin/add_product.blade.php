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

          <div>
            <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data" style="width: 60%; margin: auto; margin-top: 20px; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #333; color: #fff;">
                @csrf
                <h2 style="text-align: center; margin-bottom: 20px;">Add New Product</h2>

                <!-- Product Title -->
                <div class="form-group">
                    <label for="title" style="font-weight: bold;">Product Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter product title" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" style="font-weight: bold;">Description</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Enter product description" rows="3" required></textarea>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price" style="font-weight: bold;">Price</label>
                    <input type="text" id="price" name="price" class="form-control" placeholder="Enter product price" required>
                </div>

                <!-- Quantity -->
                <div class="form-group">
                    <label for="quantity" style="font-weight: bold;">Quantity</label>
                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Enter product quantity" required>
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label for="category" style="font-weight: bold;">Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="" disabled selected>Select a category</option>

                        @foreach($category as $category)
                        <option value = "{{$category->category_name}}">
                            {{$category->category_name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Image -->
                <div class="form-group">
                    <label for="image" style="font-weight: bold;">Product Image</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary href="{{url('submit_product')}}">Add Product</button>
                </div>
            </form>
        </div>
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

