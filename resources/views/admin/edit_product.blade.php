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
                <!-- Text Field and Confirm Button -->
                <form action="{{ url('update_product', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="margin-top: 20px;">
                    <label for="title" class="form-label" style="font-weight: bold;">Product Title</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ $data->title }}" style="width: 50%; margin-bottom: 10px;">

                        <!-- Description -->
                        <label for="description" class="form-label" style="font-weight: bold;">Description</label>
                        <input type="text" id="description" class="form-control" name="description" value="{{ $data->description }}" style="width: 50%; margin-bottom: 10px;">

                        <!-- Price -->
                        <label for="price" class="form-label" style="font-weight: bold;">Price</label>
                        <input type="text" id="price" class="form-control" name="price" value="{{ $data->price }}" style="width: 50%; margin-bottom: 10px;">

                        <!-- Quantity -->
                        <label for="quantity" class="form-label" style="font-weight: bold;">Quantity</label>
                        <input type="text" id="quantity" class="form-control" name="quantity" value="{{ $data->quantity }}" style="width: 50%; margin-bottom: 10px;">

                        <!-- Category -->
                        <label for="category" class="form-label" style="font-weight: bold;">Category</label>
                        <select id="category" name="category" class="form-control" required>
                            <option value="{{$data->category}}" selected>{{$data->category}}</option>

                            @foreach($category as $category)
                            <option value = "{{$category->category_name}}">
                                {{$category->category_name}}
                            </option>
                            @endforeach
                        </select>

                        <!-- Product Image -->
                        <label for="image" class="form-label" style="font-weight: bold;">Upload New Product Image</label>
                        <input type="file" id="image" name="image" class="form-control-file" onchange="previewImage(event)">
                        <div style="margin-top: 10px;">
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 150px; height: 150px; object-fit: cover; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
      </div>
    <!-- JavaScript files-->
    <script>
      // JavaScript function to preview the uploaded image
      function previewImage(event) {
          const imagePreview = document.getElementById('imagePreview');
          const file = event.target.files[0];

          if (file) {
              const reader = new FileReader();

              reader.onload = function(e) {
                  imagePreview.src = e.target.result; // Set the image source to the file's data URL
                  imagePreview.style.display = 'block'; // Make the image visible
              };

              reader.readAsDataURL(file); // Read the file as a data URL
          } else {
              imagePreview.src = '#';
              imagePreview.style.display = 'none'; // Hide the image if no file is selected
          }
      }
    </script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
    <script>
      // JavaScript function for confirm button
      function confirmAction() {
        const inputValue = document.getElementById('inputField').value;
        if (inputValue) {
          alert('You entered: ' + inputValue);
        } else {
          alert('Please enter some text before confirming.');
        }
      }
    </script>
  </body>
</html>