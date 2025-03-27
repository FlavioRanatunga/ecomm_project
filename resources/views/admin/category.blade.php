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
            <form action="{{url('add_category')}}" method="post">
              @csrf
            <div class="form-group" style="margin-top: 20px;">
                <h1 for="category" class="form-label" style="font-weight: bold;">Add new category</h1>
                <input type="text" name="category" id="category" class="form-control" placeholder="Enter category name" style="width: 50%; margin-bottom: 10px;">
                <input class="btn btn-primary" type="submit" value="Add Category">
            </div>
          </div>
          
          <div>
              <table class="table table-bordered table-striped" style="width: 60%; margin: auto; margin-top: 50px; border: 2px solid yellowgreen; background-color: #f9f9f9;">
                  <thead style="background-color: yellowgreen; color: white;">
                      <tr>
                          <th style="text-align: center; padding: 10px; font-size: 18px;">Category Name</th>
                          <th style="text-align: center; padding: 10px; font-size: 18px;">Delete</th>
                          <th style="text-align: center; padding: 10px; font-size: 18px;">Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $data)
                      <tr>
                          <td style="text-align: center; padding: 10px; font-size: 16px;">{{$data->category_name}}</td>
                          <td style="text-align: center; padding: 10px; font-size: 16px;">
                            <a class="btn btn-success" href="{{url('edit_category', $data->id)}}">Edit</a>
                          </td>
                          <td style="text-align: center; padding: 10px; font-size: 16px;">
                            <a class="btn btn-danger" onClick="confirmation(event)" href="{{url('delete_category', $data->id)}}">Delete</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
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
     </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

