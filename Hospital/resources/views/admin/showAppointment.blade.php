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
                        <th class="appointment-th">Customer Name</th>
                        <th class="appointment-th">Email</th>
                        <th class="appointment-th">Phone</th>
                        <th class="appointment-th">Doctor Name</th>
                        <th class="appointment-th">Date</th>
                        <th class="appointment-th">Message</th>
                        <th class="appointment-th">Status</th>
                        <th class="appointment-th">Approved</th>
                        <th class="appointment-th">Cancelled</th>
                    </tr>
                    @foreach($data as $appoints)
                    <tr>
                    <td class="appointment-td">{{$appoints->name}}</td>
                    <td class="appointment-td">{{$appoints->email}}</td>
                    <td class="appointment-td">{{$appoints->phone}}</td>
                    <td class="appointment-td">{{$appoints->doctor}}</td>
                    <td class="appointment-td">{{$appoints->date}}</td>
                    <td class="appointment-td">{{$appoints->message}}</td>
                    <td class="appointment-td">{{$appoints->status}}</td>
                    <td class="appointment-td text-center">
                         <a href="{{url('approveAppointment',$appoints->id)}}" class="btn btn-success" >Approve</a>
                    </td>
                    <td class="appointment-td text-center">
                        <a href="{{url('cancelAppointment',$appoints->id)}}" class="btn btn-danger" >Cancel</a>
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
