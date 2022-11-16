<div class="page-section" id="redirect" >
    <div class="container" >
      <h1 class="text-center wow fadeInUp bigg " >Make an Appointment</h1>


    <form  class="main-form" action="{{url('appointment')}}" method="post" >
        @csrf
        <div class="row mt-5 " id="redirect">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" >
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" >
            <select name="doctor" id="department" class="custom-select">
                @foreach($doctor as $doctors)
                <option value="general">{{$doctors->name}} (doctor of {{$doctors->speciality}})</option>
                @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp"  >
            <input type="text" name="phone" class="form-control" placeholder="Number..">          </div>
          <div   class="col-12 py-2 wow fadeInUp" >
            <textarea name="message"  id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>
        @if(session()->has('message'))
        <script>
        //   let el = document.getElementById('redirect');
          window.scrollTo(220,3000);
          // el.scrollIntoView({ behavior: 'smooth', block: 'end' });

          </script>
        <div class="alert alert-success alert-dismissible"  role="alert" >
            {{session()->get('message')}}
            <span type="button" class="close"  data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        {{-- <strong>Warning!</strong> Still on beta stage. --}}
      </div>

      @endif
        <button type="submit" style="background-color:#00D9A5"  class="btn btn-primary mt-3  zoomIn">Submit Request</button>
      </form>


    </div>
  </div>

  <style>
  </style>
