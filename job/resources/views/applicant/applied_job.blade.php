<!DOCTYPE html>
<html lang="en">
<!-- head -->
@include('applicant.layouts.head')
<body>
	<!-- Navbar -->
	@include('applicant.layouts.nav')
	<div class="container">
		<!-- table for showing applied job -->
		<table class="table table-bordered" style="width:50%">
		  <thead>
		    <th>Name</th>
		    <th>Bussiness name</th>
		    <th>email</th>
		    <th>Job Title</th>
		    <th>Salary</th>
		    <th>Action</th>
		  </thead>
		  <tbody>
		  @foreach($applied_job as $applied_job)
		  	<tr>
		        <td>{{$applied_job->first_name.$applied_job->last_name}}</td>
		        <td>{{$applied_job->bussiness_name}}</td>
		        <td>{{$applied_job->email}}</td>
		        <td>{{$applied_job->job_title}}</td>
		        <td>{{$applied_job->salary}}</td>
		        <td><a href="jobdetails\{{$applied_job->id}}"> Details</a></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<!-- end table -->

	</div>
</body>
@include('applicant.layouts.footer')
</html>