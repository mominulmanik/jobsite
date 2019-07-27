<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Applicant;
use App\Appliedjob;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Jobdetails;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('applicant.index');
    }
    //job details
    public function jobdetails($id)
    {
    	$job_details = DB::table('jobdetails')
                      ->join('companies','jobdetails.company_id','=','companies.c_id')
                      ->where('id',$id)->get();
        return view('applicant.jobdetails')->with('job_details',$job_details);
    }
    //Profile
    public function profile()
    {
    	$user_id=Auth::user()->id;
    	$applicants= DB::table('applicants')->where('user_id',$user_id)->get();
    	Session::put('error','');
        return view('applicant.profile')->with('applicants',$applicants);
    }
    //Job apply
    public function job_apply($id)
    {
    	$user_id=Auth::user()->id;
    	$applicants= DB::table('applicants')->where('user_id',$user_id)->get();
    	foreach ($applicants as $applicants) {
    		$applicant_id=$applicants->a_id;
    		$resume=$applicants->resume;	
    	}

        $job_details=Jobdetails::find($id);
        $company_id=$job_details->company_id;

    	if($resume==null){
    	return redirect('/profile')->with('error','Please Upload resume first');
    	}
    	else {
            $appliedjob= new Appliedjob();
            $appliedjob->applicant_id=$applicant_id;
            $appliedjob->company_id=$company_id;
            $appliedjob->job_id=$id;
            $appliedjob->save();

    		return back()->with('success','Applied Successfuly');
    	}
    }
    // It is for update and upload image resume and other info
    public function upload(Request $request,$id)
    {
    	request()->validate([
            'first_name'=> 'required',
            'last_name' => 'required',
            'email'     => 'required',    
            'image'     => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'resume'    => 'mimes:pdf,docx|max:2048',
            'skill'     => 'required',

        ]);
        $applicants= DB::table('applicants')->where('a_id',$id)->get();
        foreach ($applicants as $applicants) {
            $image=$applicants->image;
            $resume=$applicants->resume;
        }
        if($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            if($image!=null){
                File::delete('images/'.$image);
            }
        }
        else {
            $imageName=$image;
        }
        if($request->hasFile('resume')){
            $cvname = time().'.'.request()->resume->getClientOriginalExtension();
            request()->resume->move(public_path('pdf'), $cvname);
            if($resume!=null){
                File::delete('pdf/'.$resume);
            }
            
        }
        else{
            $cvname=$resume;
        }
        $skills    =request()->skill;
        $first_name=request()->first_name;
        $last_name =request()->last_name;
        $email     =request()->email;
        DB::update('update applicants set first_name =?, last_name=?,email=?, image = ?,resume=?,skills=? where a_id=?',[$first_name,$last_name,$email,$imageName,$cvname,$skills,$id]);
        
        return back()->with('success','Updated Successfuly');
    }
    //It shows applied info
    public function applied_job(){
        $user_id=Auth::user()->id;
        $applied_job=DB::table('applicants')
                    ->join('appliedjobs','applicants.a_id','=','appliedjobs.applicant_id')
                    ->join('companies','appliedjobs.company_id','=','companies.c_id')
                    ->join('jobdetails','appliedjobs.job_id','=','jobdetails.id')
                    ->where('applicants.user_id',$user_id)->get();
        return view('applicant.applied_job')->with('applied_job',$applied_job);
    }
}
