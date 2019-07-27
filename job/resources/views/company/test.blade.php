<!DOCTYPE html>
<html lang="en">
@include('company.layouts.head')
<body>
@include('company.layouts.nav')
<div class="container">
   <div class="panel panel-default">
        <div class="panel-heading"><strong>All job posted from this company</strong> </div>

        @foreach($job_post as $job_post)
        <div class="panel-body">
          	<strong>Job Title:</strong>
          	{{ $job_post->job_title }}
          	
          	<div id="tables{{$job_post->id}}"></div>
          	<button type="button" onclick="gets('gettable/{{$job_post->id}}','{{$job_post->id}}')"   class="btn btn-info" style="float: right;">Show Applicants</button>
		 
        </div>
         @endforeach
      </div>
    
  </div>

</body>
<script>
         function gets(url1,id) {

            $.ajax({
               type:'GET',
               url:url1,
               data:'',
               success:function(data) {
                  $("#tables"+id).append(data);
               }
            });
         }
         function resume(){
         	
         }
      </script>
</html>
