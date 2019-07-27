<!DOCTYPE html>
<html lang="en">
@include('applicant.layouts.head')
<body>
@include('applicant.layouts.nav')
<div class="container">
	<!-- Alert message -->
	@if(Session::get('success'))
	<div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
    @if(Session::get('error'))
    <div class="alert alert-success">
        <p>{{ Session::get('error') }}</p>
    </div>
    @endif
    <!-- panel start -->
   	<div class="panel panel-default">
   		<!-- panel header -->
        <div class="panel-heading">
        	<strong>{{Auth::user()->name}} Profile</strong>
        </div>
        <!-- end panel header -->
        @foreach($applicants as $applicants)
        <!-- panel body start -->
        <div class="panel-body">
        	<!-- show and update profile form start -->
        	<form action="/upload/{{$applicants->a_id}}" method="POST" enctype="multipart/form-data">

            @csrf
            	<div class="form-group row">
	                <label for="first_name" class="col-md-2 ">{{ __('First name') }}</label>

	                <div class="col-md-4" id="first_name">
	                    {{$applicants->first_name}}
	                    <a onclick="change('first_name','{{$applicants->first_name}}')">Change</a>
	                    <input type="hidden" name="first_name" value="{{$applicants->first_name}}">
					</div>
            	</div>
            	<div class="form-group row">
	                <label for="last_name" class="col-md-2 ">{{ __('last name') }}</label>

	                <div class="col-md-4" id="last_name">
	                    {{$applicants->last_name}}
	                    <a onclick="change('last_name','{{$applicants->last_name}}')">Change</a>
	                    <input type="hidden" name="last_name" value="{{$applicants->last_name}}">
					</div>
            	</div>
            	<div class="form-group row">
	                <label for="email" class="col-md-2 ">{{ __('Email') }}</label>

	                <div class="col-md-4" id="email">
	                    {{$applicants->email}}
	                    <a onclick="change('email','{{$applicants->email}}')">Change</a>
	                    <input type="hidden" name="email" value="{{$applicants->email}}">
					</div>
            	</div>
            	<div class="form-group row">
	                <label for="image" class="col-md-2 ">{{ __('Applicant Photo') }}</label>

	                <div class="col-md-4" id="image">
	                    @if($applicants->image)
	                    
	                     <img src="images/{{$applicants->image}}" width="100px" height="100px">
	                     <a onclick="change('image')">Change</a> 
	                     
	                     @else
	                     <input type="file" name="image" id="image" class="form-control" >
	                     @endif
	                	
					</div>
            	</div>
            	<div class="form-group row">
	                <label for="resume" class="col-md-2 ">{{ __('Applicant Resume') }}</label>

	                <div class="col-md-4" id="resume">
	                    @if($applicants->resume)
	                    <iframe src="pdf/{{$applicants->resume}}" frameborder="0" style="width:300px; height:100px;"  ></iframe>{{$applicants->resume}}
	                     <a onclick="change('resume')">Change</a> 
	                     
	                     @else
	                     <input type="file" name="resume" id="resume" class="form-control" >
	                     @endif

					</div>
            	</div>
            	<div class="form-group row">
	                <label for="skill" class="col-md-2 ">{{ __('Skills') }}</label>

	                <div class="col-md-4" id="skill">
	                    <input type="text" name="skill" id="skill" class="form-control" value="{{$applicants->skills}}">
					</div>
            	</div>
            	<div class="form-group">
					<button type="submit" class="btn btn-success">Update</button>
				</div>
        	</form>
        <!-- form end -->
        </div>
        <!-- end panel body -->
        @endforeach
    </div>
    <!-- panel end -->
</div>
</body>
@include('applicant.layouts.footer')
</html>
