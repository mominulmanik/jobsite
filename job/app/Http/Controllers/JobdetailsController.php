<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Jobdetails;
use Illuminate\Http\Request;
use Session;

class JobdetailsController extends Controller
{
    //
    public function index()
    {
        $user_id=Auth::user()->id;
        $company=DB::table('companies')->where('user_id',$user_id)->get();
        foreach ($company as $company) {
        	$company_id=$company->c_id;
        }
        Session::put('company_id',$company_id);
    	$job_post=DB::table('companies')
    			->join('jobdetails','companies.c_id','=','jobdetails.company_id')
    			->where('user_id',$user_id)->get();
        return view('company.add_jobpost')->with('job_post',$job_post);
    }


    //store job info
    public function store(Request $request)
    {
        $request->validate([
        	'company_id' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'salary' => 'required',
            'job_location' => 'required',
            'country' => 'required',
        ]);
  
        Jobdetails::create($request->all());
   
        return redirect()->route('jobposts.index')
                        ->with('success','Post created successfully.');
    }

    //show specific job details
    public function show($id)
    {
         $job_details = DB::table('jobdetails')->where('id',$id)->get();
         return view('company.jobdetails')->with('job_details',$job_details);
    }

    //update job info
    public function update(Request $request,$id)
    {
        $jobdetails = Jobdetails::find($id);
        
        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required',
            'salary' => 'required',
            'job_location' => 'required',
            'country' => 'required',
         ]);
        $jobdetails->update($request->all());
  
        return back()->with('success','User updated successfully');
    }

    //delete job post
    public function destroy($id)
    {
        Jobdetails::find($id)->delete();
  
        return redirect()->route('jobposts.index')
                        ->with('success','Post deleted successfully');
    }
}