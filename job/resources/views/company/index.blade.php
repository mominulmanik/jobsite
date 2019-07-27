<!DOCTYPE html>
<html lang="en">
<!-- header -->
@include('company.layouts.head')
<body>
<!-- navbar -->
@include('company.layouts.nav')
<!-- container -->
	<div class="container">
		<!-- panel -->
   		<div class="panel panel-default">
   			<!-- panel header -->
        	<div class="panel-heading">
        		<strong>All job posted from this company</strong> 
        	</div>
        	<!-- end header -->
        	@foreach($job_post as $job_post)
        	<!-- panel body -->
        	<div class="panel-body">
          		<strong>Job Title:</strong>
          		{{ $job_post->job_title }}
          	
          		<div id="tables{{$job_post->id}}">
          		</div>
          		<button type="button" onclick="gets('gettable/{{$job_post->id}}','{{$job_post->id}}')"   class="btn btn-info" style="float: right;">
          		Show Applicants
          		</button>
		 
        	</div>
        	<!-- end panel body -->
         	@endforeach
      	</div>
    	<!-- end panel -->
  </div>
<!-- end container -->
</body>
<script>
         function gets(url1,id) {

            $.ajax({
               type:'GET',
               url:url1,
               data:'',
               success:function(data) {
               		$("#tables"+id).empty();
                  	$("#tables"+id).append(data);
               }
            });
         }
         function resume(){
         	
         }
      </script>
</html>
