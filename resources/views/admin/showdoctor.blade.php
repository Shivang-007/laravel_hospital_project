
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div>
                <table class="table table-responsive mt-3">
                    <thead class="thead-light">
                      <tr style="background-color: aqua;">
                        <th scope="col">Doctor Name</th>
                        <th scope="col">email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">Image</th>
                        <th scope="col" colspan="2">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datas)
                        
                    <tr>
                      <td>{{$datas->name}}</td>
                      <td>{{$datas->email}}</td>
                      <td>{{$datas->phone}}</td>
                      <td>{{$datas->speciality}}</td>
                      <td><img height="100" width="100" src="doctorimage/{{$datas->image}}" alt="not found"></td> 
                      <td><a href="{{url('update',$datas->id)}}" class="btn btn-success">Update</a></td>
                      <td><a href="{{url('delete',$datas->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to delete this')">Delete</a></td>

        
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>