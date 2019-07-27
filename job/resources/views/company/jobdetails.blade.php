<!DOCTYPE html>
<html lang="en">
<!-- header -->
@include('company.layouts.head')
<body>
<!-- navbar -->
@include('company.layouts.nav')
<!-- container -->
  <div class="container">
    <!-- Alert -->
    @if(Session::get('success'))
    <div class="alert alert-success">
      <p>{{ Session::get('success') }}</p>
    </div>
    @endif
    <!-- end Alert -->
    <!-- job details -->
    <h2>Job Details</h2>
  
    @foreach($job_details as $job_details)
      <!-- panel -->
      <div class="panel panel-default">
        <!-- panel body -->
        <div class="panel-body">
          <!-- start form update -->
          <form action="{{ route('jobposts.update',$job_details->id)}}" method="POST">
            @csrf
            @method('PUT')
              <strong>Job Title</strong>
              <div id="job_title">
                {{$job_details->job_title}}
                <input type="hidden" name="job_title" id="job_title" value="{{$job_details->job_title}}">
                <a onclick="changedetails('job_title','{{$job_details->job_title}}')">Edit</a>
              </div>
              <strong>Job Description</strong>
              <div id="job_description">
                <p>{{$job_details->job_description}}</p>
                <a onclick="changedetails('job_description','{{$job_details->job_description}}')">Edit</a>
                <input type="hidden" name="job_description" id="job_description" value="{{$job_details->job_description}}">
              </div>
              <strong>Salary</strong>
              <div id="salary">
                <p>{{$job_details->salary}}</p>
                <a onclick="changedetails('salary','{{$job_details->salary}}')">Edit</a>
                <input type="hidden" name="salary" id="salary" value="{{$job_details->salary}}">
              </div>
              <strong>Job Location</strong>
              <div id="job_location">
                <p>{{$job_details->job_location}}</p>
                <a onclick="changedetails('job_location','{{$job_details->job_location}}')">Edit</a>
                <input type="hidden" name="job_location" id="job_location" value="{{$job_details->job_location}}">
              </div>
              <strong>Country</strong>
              <div id="country">
                <p>{{$job_details->country}}</p>
                <a onclick="changedetails('country','{{$job_details->country}}')">Edit</a>
                <input type="hidden" name="country" id="country" value="{{$job_details->country}}">
              </div>
              <button type="submit" class="btn btn-primary" style="float: right; margin-left: 5px;">Update Post</button> 
          </form>
          <!-- end update form -->
          <!-- delete form -->
          <form action="{{ route('jobposts.destroy',$job_details->id)}}" method="post">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-danger" style="float: right;">Delete Post</button>
          </form>
          <!-- end delete form -->
        </div>
        <!-- end panel body -->
      </div>
      <!-- end panel -->
    @endforeach

</body>

</html>
