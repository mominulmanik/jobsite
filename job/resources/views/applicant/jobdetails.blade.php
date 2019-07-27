<!DOCTYPE html>
<html lang="en">
<!-- Header -->
@include('applicant.layouts.head')
<body>
<!-- Navbar -->
@include('applicant.layouts.nav')
<!-- Container -->
	<div class="container">
		<!-- Alert msg -->
		@if(Session::get('success'))
		<div class="alert alert-success">
	        <p>{{ Session::get('success') }}</p>
	    </div>
	    @endif
	    <!-- End Alertmsg -->
	   	<h2>Job Details</h2>
	  	<!-- Job Details -->
	    @foreach($job_details as $job_details)
	    
	      <div class="panel panel-default">
	      	<!-- panel header -->
	        <div class="panel-heading">
	          <strong>{{$job_details->bussiness_name}}</strong>
	          <p><strong>{{$job_details->job_title}}</strong></p>
	        </div>
	        <!-- end panel header -->
	        <!-- panel body -->
	        <div class="panel-body">
	          <strong>Job details:</strong><p>{{$job_details->job_description}}</p>
	          <strong>Salary:</strong><p>{{$job_details->salary}}</p>
	          <strong>Job Location:</strong><p>{{$job_details->job_location}}</p>
	          <strong>Country:</strong><p>{{$job_details->country}}</p>
	        <a href="/job_apply/{{$job_details->id}}" class="btn btn-primary" style="float: right; margin-left: 5px;">Apply</a> 
	        </div>
	        <!-- end panel body -->
	      </div>
	    
	    @endforeach
	    <!-- end job details -->
	</div>
	<!-- end container -->
</body>
@include('applicant.layouts.footer')
</html>
