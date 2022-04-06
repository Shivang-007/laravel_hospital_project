
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
        <div class="container page-body-wrapper">
            <div>
                <table class="table table-sm mt-3">
                    <thead class="thead-light">
                      <tr style="background-color: aqua;">
                        <th scope="col">Customer Name</th>
                        <th scope="col">email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Cencel</th>
                        <th scope="col">MailStatus</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        
                    <tr>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->phone}}</td>
                      <td>{{$data->doctor}}</td>
                      <td>{{$data->date}}</td>
                      <td>{{$data->message}}</td>
                      <td>{{$data->status}}</td>
                      <td><a href="{{url('approved',$data->id)}}" class="btn btn-success">Approved</a></td>
                      <td><a href="{{url('cenceled',$data->id)}}" class="btn btn-danger">Cenceled</a></td>
                      <td><a href="{{url('email',$data->id)}}" class="btn btn-danger">Send Mail</a></td>


        
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