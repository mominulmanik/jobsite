<!DOCTYPE html>
<html lang="en">
@include('company.layouts.head')
<body>
@include('company.layouts.nav')
<div class="container">
  <h2>Edit Job Info</h2>
  
    @foreach($job_details as $job_details)
    
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="/upload/{{$applicants->a_id}}" method="POST" enctype="multipart/form-data">

            @csrf
              <div class="form-group row">
                  <label for="first_name" class="col-md-2 ">{{ ('Job Title') }}</label>

                  <div class="col-md-4">
                      <input type="text" name="job_title" id="job_title" class="form-control" value="{{$job_details->job_title}}">
          </div>
              </div>
              <div class="form-group row">
                  <label for="last_name" class="col-md-2 ">{{('Job Description') }}</label>

                  <div class="col-md-4">
                      <input type="text" name="job_description" id="job_description" class="form-control" value="{{$job_details->job_description}}">
          </div>
              </div>
              <div class="form-group row">
                  <label for="email" class="col-md-2 ">{{('Salary') }}</label>

                  <div class="col-md-4">
                      <input type="text" name="salary" id="salary" class="form-control" value="{{$job_details->salary}}">
          </div>
              </div>
              <div class="form-group row">
                  <label for="image" class="col-md-2 ">{{('Job Location') }}</label>

                  <div class="col-md-4">
                      <input type="text" name="job_location" id="job_location" class="form-control" value="{{$job_details->job_location}}">
                      <div id="photo">
                      <!-- <img src="1111.jpg" width="100px" height="100px"> -->
                    </div>
          </div>
              </div>
              <div class="form-group row">
                  <label for="cv" class="col-md-2 ">{{('Country') }}</label>

                  <div class="col-md-4">
                      <input type="text" name="country" id="country" class="form-control" value="{{$job_details->country}}">

          </div>
              </div>
              <div class="form-group row">
                  <label for="skill" class="col-md-2 ">{{ __('Skills') }}</label>

                  <div class="col-md-4">
                      
          </div>
              </div>
              <div class="form-group">
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
        </form>
      </div>
    </div>
</body>
<script type="text/javascript">
  function edit(id)
  {
    var url="{{ route('jobposts.edit',"+id+")}}";
    $.ajax({
           type:'GET',
           url:url,
           data:'',
           success:function(data) {
              
           }
        });
  }
</script>

</html>
