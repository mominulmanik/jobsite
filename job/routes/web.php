<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        if (Auth::user()->user_type == 'company' ){
        	$user_id=Auth::user()->id;
	    	$job_post=DB::table('companies')
	    			->join('jobdetails','companies.c_id','=','jobdetails.company_id')
	    			->where('user_id',$user_id)->get();

	        return view('company.index')->with('job_post',$job_post);
        }
        elseif (Auth::user()->user_type == 'applicant'){
        	$job_post=DB::table('companies')
    				->join('jobdetails','companies.c_id','=','jobdetails.company_id')->get();
            return view('applicant.index')->with('job_post',$job_post);
        }
        else{
            return redirect('login');
        }
    });
    
});

Route::group(['middleware' => 'company'], function () {
    Route::get('index','CompanyController@index');
    Route::get('gettable/{id}','CompanyController@gettable');
    Route::resource('jobposts','JobdetailsController');
    Route::get('/resume/{id}','CompanyController@resume');
    });

Route::group(['middleware' => 'applicant'], function () {
    Route::get('jobdetails/{id}','ApplicantController@jobdetails');
    Route::get('/profile','ApplicantController@profile');
    Route::get('/job_apply/{id}','ApplicantController@job_apply');
    Route::post('/upload/{id}','ApplicantController@upload');
    Route::get('/applied_job','ApplicantController@applied_job');
    });

