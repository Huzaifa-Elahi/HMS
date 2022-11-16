<style>
  label{
    display: inline-block;
    width: 200px;
  }
  .speciality {
    margin-left: -112px;
}
.file {
    margin-left: 115px;
}
input.btn.btn-success {
    margin-left: 70px;
}

/* .room {
  margin-left: 27px;
}
input{
 margin-left:200px;
}





.phone {
    margin-left: 46px;
}

 */
</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->


        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">


            <div class="container" align="center" style="padding-top: 100px">

                {{-- <div class="alert alert-success alert-dismissible"> --}}
                    {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
                    {{-- <button type="button" class="close" data-dismiss="alert"></button> --}}
                    {{-- <div class="alert alert-success alert-bs-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> This alert box could indicate a successful or positive action.
                    </div> --}}
                    {{-- </div> --}}
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{session()->get('message')}}
                        <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    {{-- <strong>Warning!</strong> Still on beta stage. --}}
                    </div>
                @endif
                <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="padding-top:15px">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color:black" name="name" placeholder="Write the name" required="">
                    </div>
                    <div class="phone" style="padding-top:15px">
                        <label for="">Phone</label>
                        <input type="number" style="color:black" name="phone" placeholder="Write the number" required="">

                    </div>
                    <div class="speciality" style="padding-top:15px">
                        <label for="">Speciality</label>
                        <select  name="speciality" id="" style="color:black " required="">
                            <option value="">Select</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="nose">nose</option>

                        </select>
                    </div>
                    <div class="room" style="padding-top:15px">
                        <label for="">Room No</label>
                        <input type="number" style="color:black" name="room" placeholder="Write the room number" required="">

                    </div>
                    <div class="file" style="padding-top:15px">
                        <label for="">Doctor Image</label>
                        <input type="file"  name="file" required="">

                    </div>
                    <div style="padding-top:15px">

                        <input type="submit" class="btn btn-success" >

                    </div>

                </form>
            </div>

        </div>
        {{-- @include('admin.main') --}}
        <!-- main-panel ends -->

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.app')
    <!-- End custom js for this page -->
  </body>
</html>
