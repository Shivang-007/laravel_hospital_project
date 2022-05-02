
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
                    <h1 class="text-center m-5">Add Doctor</h1>
                    <div>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                            {{session()->get('message')}}
                        </div>
                        @endif
                    </div>
                    <form action="{{url('edit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                            
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Doctor's Name</label>
                            <div class="col-sm-10">
                                <input type="text" style="color: black" name="name" class="form-control" id="name" placeholder="Name" value="{{$data->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" style="color: black" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{$data->email}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-sm-2 col-form-label">Contact No.</label>
                            <div class="col-sm-10">
                                <input type="number" style="color: black" name="phone" class="form-control" id="contact" placeholder="contact" value="{{$data->phone}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="speciality" class="col-sm-2 col-form-label">Speciality</label>
                            <div class="col-sm-10">
                            <select class="form-select" name="speciality" aria-label="Default select example" value="{{$data->speciality}}" required>
                                <option selected>Open this select menu</option>
                                <option value="eye">Eye</option>
                                <option value="nose">Nose</option>
                                <option value="ear">Ear</option>
                                <option value="teeth">Teeth</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Doctor's Old Image</label>
                            <div class="col-sm-10">
                                <img src="doctorimage/{{$data->image}}" height="150" width="150" alt="not found">
                                {{-- <input type="file" name="file" class="form-control" id="image" placeholder="image" required> --}}
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Doctor's New Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="file" class="form-control" id="image" placeholder="image">
                            </div>
                        </div>
    
                        <button type="submit" class="btn btn-success">Update</button>
                       
                    </form>
                    
                </div>
            </div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>