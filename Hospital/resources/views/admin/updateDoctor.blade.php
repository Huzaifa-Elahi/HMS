<style>
    label{
      display: inline-block;
      width: 200px;
    }
    .speciality {
      margin-left: -120px;
  }
  .file {
      margin-left: 105px;
  }
  input.btn.btn-success {
      margin-left: 65px;
  }
  img {
    margin-left: 30px;
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

                      @if(session()->has('message'))
                      <div class="alert alert-success alert-dismissible" role="alert">
                          {{session()->get('message')}}
                          <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                      {{-- <strong>Warning!</strong> Still on beta stage. --}}
                      </div>
                  @endif
                  <form action="{{url('editedDoctor',$data->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div style="padding-top:15px">
                          <label for="">Doctor Name</label>
                          <input type="text" style="color:black" name="name" placeholder="Write the name" value={{$data->name}} required="">
                      </div>
                      <div class="phone" style="padding-top:15px">
                          <label for="">Phone</label>
                          <input type="number" style="color:black" name="phone" placeholder="Write the number" value={{$data->phone}}  required="">

                      </div>
                      <div class="speciality" style="padding-top:15px">
                          <label for="">Speciality</label>
                          <select  name="speciality" id="" style="color:black "  required="">
                              {{-- <option value="">Select</option> --}}
                              <option value="skin" {{old('speciality',$data->speciality=='skin' ? 'selected' : '')}}>Skin</option>
                              <option value="nose" {{old('speciality',$data->speciality=='nose' ? 'selected' : '')}}>nose</option>
                              <option value="eye" {{old('speciality',$data->speciality=='eye' ? 'selected' : '')}}>eye</option>
                              <option value="heart" {{old('speciality',$data->speciality=='heart' ? 'selected' : '')}}>heart</option>
                              {{-- <option value="" {{old($data->speciality=='heart' ? 'selected' : '')}}>heart</option>
                              <option value="{{old($data->speciality=='eye' ? 'selected' : '')}}">eye</option>
                              <option value="{{old($data->speciality=='nose' ? 'selected' : '')}}">nose</option> --}}

                          </select>
                      </div>
                      <div class="room" style="padding-top:15px">
                          <label for="">Room No</label>
                          <input type="number" style="color:black" name="room" value={{$data->room}}  placeholder="Write the room number" required="">

                      </div>
                      <div class="file" class="prev-img" style="padding-top:15px">
                          <label for="">Previous Image</label>
                          <img height="150" width='150' src="{{asset('doctorImage/'.$data->image)}}" alt="">
                          {{-- <img height="150" width='150' src="doctorImage/{{$data->image}}" alt=""> --}}
                          {{-- <input  type="file"  name="file" value={{$data->image}}   required=""> --}}

                      </div>
                      <div class="file" style="padding-top:15px">
                          <label for="">Updated Image</label>
                          {{-- <img height="150" width='150' src="{{asset('doctorImage')}}" alt=""> --}}
                          {{-- <img height="150" width='150' src="doctorImage/{{$data->image}}" alt=""> --}}
                          <input  type="file"  name="file" value={{$data->image}}   >

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
