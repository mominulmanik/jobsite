<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Company;
use App\Jobdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index()
    {
    	$user_id=Auth::user()->id;
    	$job_post=DB::table('companies')
    			->join('jobdetails','companies.c_id','=','jobdetails.company_id')
    			->where('user_id',$user_id)->get();

        return view('company.test')->with('job_post',$job_post);
    }
 	
    //It show applicant how apply for job 
    public function gettable($id)
    {
    	$jobapplicants=DB::table('appliedjobs')
    				->join('applicants','appliedjobs.applicant_id','=','applicants.a_id')
    				->where('job_id',$id)->get();

    	$output='<p><strong style="color:red">Still No one applied for the post.</strong></p>';
        
        foreach ($jobapplicants as $data) {
            $output='<table class="table table-bordered" style="width:50%">
              
              <thead>
                <th>First name</th>
                <th>last name</th>
                <th>email</th>
                <th>Photo</th>
                <th>Resume</th>
                <th>Skill</th>
              </thead>
              <tbody>';
            $output.='<tr>'.
                    '<td>'.$data->first_name.'</td>'.
                    '<td>'.$data->last_name.'</td>'.
                    '<td>'.$data->email.'</td>'.
                    '<td>'.$data->image.'</td>'.
                    '<td><a href="/resume/'.$data->resume.'" target="_blank" >'.$data->resume.'</a></td>'.
                    '<td>'.$data->skills.'</td>'.
                    '</tr>
                    </tbody></table>';
        	}
	        
        return Response($output);
    }
    //download resume  
    public function resume($id)
    {
    	$pathToFile="pdf/".$id;
    	return response()->download($pathToFile);
    }

}

