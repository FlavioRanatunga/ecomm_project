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
                <form action="{{ url('update_category', $data->id) }}" method="POST">
                    @csrf
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="inputField" class="form-label" style="font-weight: bold;">Edit Category</label>
                        <input type="text" id="inputField" class="form-control" name="category" value="{{ $data->category_name }}" style="width: 50%; margin-bottom: 10px;">
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </form>
            </div>
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