<style>
    label{
      display: inline-block;
      width: 200px;
    }
    .speciality {
      margin-left: -122px;
  }
  .file {
      margin-left: 105px;
  }
  input.btn.btn-success {
      margin-left: 65px;
  }
  .appointment-th{
        padding: 10px;
        font-size: 20px;
        background-color: #00D9A5;
        border: 1px solid rgb(190, 190, 190);
        color: white;
        text-align: center;
    }
    td.appointment-td {
        padding: 18px;

        border: 1px solid rgb(190, 190, 190);;
}


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


            <div align="center" style="padding:50px">
                <table>
                    <tr>
                        <th class="appointment-th">Doctor Name</th>
                        {{-- <th class="appointment-th">Email</th> --}}
                        <th class="appointment-th">Phone</th>
                        <th class="appointment-th">Speciality</th>
                        <th class="appointment-th">Room</th>
                        <th class="appointment-th">Image</th>
                        {{-- <th class="appointment-th">Message</th>
                        <th class="appointment-th">Status</th> --}}
                        {{-- <th class="appointment-th">Approved</th> --}}
                        <th class="appointment-th">Update</th>
                        <th class="appointment-th">Delete</th>
                    </tr>
                    @foreach($data as $doctors)
                    <tr>
                    <td class="appointment-td">{{$doctors->name}}</td>
                    {{-- <td class="appointment-td">{{$doctors->email}}</td> --}}
                    <td class="appointment-td">{{$doctors->phone}}</td>
                    <td class="appointment-td">{{$doctors->speciality}}</td>
                    <td class="appointment-td">{{$doctors->room}}</td>
                    <td class="appointment-td"><img style="height:100px" src="doctorImage/{{$doctors->image}}" alt=""></td>
                    {{-- <td class="appointment-td">{{$doctors->message}}</td>
                    <td class="appointment-td">{{$doctors->status}}</td> --}}
                    {{-- <td class="appointment-td text-center">
                         <a href="{{url('approveAppointment',$doctors->id)}}" class="btn btn-success" >Approve</a>
                    </td> --}}
                    <td class="appointment-td text-center">
                        <a href="{{url('updateDoctor',$doctors->id)}}" class="btn btn-warning" >Update</a>
                    </td>
                    <td class="appointment-td text-center">
                        <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('deleteDoctor',$doctors->id)}}" class="btn btn-danger" >Delete</a>
                    </td>
                     {{-- <td>Date</td>
                    // <td>Message</td>
                    // <td>Status</td> --}}
                    </tr>
                    @endforeach
                </table>
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
