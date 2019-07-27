<!DOCTYPE html>
<html lang="en">
<!-- header -->
@include('applicant.layouts.head')
<body>
	<!-- navbar -->
	@include('applicant.layouts.nav')
	<div class="container">
	  <h2>Job Circular</h2>
	  @if($job_post)
	  <!-- AllPosted Job Display -->
	    @foreach($job_post as $job_post)
	    <a href="jobdetails\{{$job_post->id}}">
	      <div class="panel panel-default">
	        <div class="panel-heading">
	          <strong>Bussiness Name: {{$job_post->bussiness_name}}</strong>
	          <p><strong>Job Title: {{$job_post->job_title}}</strong></p>
	        </div>
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
</body>
@include('applicant.layouts.footer')
</html>
