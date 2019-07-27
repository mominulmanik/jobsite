<!DOCTYPE html>
<html lang="en">
<!-- header -->
@include('company.layouts.head')
<body>
<!-- Navbar -->
@include('company.layouts.nav')
<!-- start container -->
  <div class="container">
      @if(Session::get('success'))
    <div class="alert alert-success">
          <p>{{ Session::get('success') }}</p>
      </div>
      @endif
      <a class="btn btn-success " data-toggle="modal" data-target="#myModal"  style="float: right;">Post New Job</a>
    <h2>Posted Job</h2>
    @if ($job_post)
      @foreach($job_post as $job_post)
      <a href="{{ route('jobposts.show',$job_post->id)}}">
        <div class="panel panel-default">
          <div class="panel-heading">
            <p><strong>{{$job_post->job_title}}</strong></p></div>
          <div class="panel-body">
            <strong>Salary:</strong><p>{{$job_post->salary}}</p>
            <strong>Job Location:</strong><p>{{$job_post->job_location}}</p>
            <strong>Country:</strong><p>{{$job_post->country}}</p>
          </div>
        </div>
      </a>
      @endforeach
    
    @else 
      <div class="panel panel-default">
      <div class="panel-heading">No job posted</div>
      </div>
    
    @endif
    <!-- Modal start -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <!-- Modal header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Post new job</h4>
          </div>
          <!-- end modal header -->
          <!-- start Modal body -->
          <div class="modal-body">
            <!-- start form -->
            <form action="{{ route('jobposts.store') }}" method="POST">
            {{ csrf_field() }}
          
              <input type="hidden" name="company_id" value="{{Session::get('company_id')}}" >
              <!-- row start -->
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Job title:</strong>
                    <input type="text" name="job_title" class="form-control" placeholder="Job tile">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Job description:</strong>
                    <textarea type="text" class="form-control" name="job_description" placeholder="Job description"></textarea>  
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Salary:</strong>
                    <input type="text" class="form-control" name="salary" placeholder="Salary">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Job location:</strong>
                    <input type="text" class="form-control" name="job_location" placeholder="Job location">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Country:</strong>
                    <input type="text" class="form-control" name="country" placeholder="Country">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <!-- end row -->
            </form>
            <!-- end form -->
          </div>
          <!-- end modal body -->
        </div>
        <!-- end Modal content -->
      </div>
    </div> 
    <!-- end Modal -->             
  </div>
</body>

</html>
