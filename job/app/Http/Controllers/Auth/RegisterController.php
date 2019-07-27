<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use App\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_type'=>['required'],

            'bussiness_name'=>['string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $first_name=$data['first_name'];
        $last_name=$data['last_name'];
        $email= $data['email'];
        $user_type=$data['user_type'];
        $password=$data['password'];

        $company=new Company();
        $applicant= new Applicant();

        
        $user1=User::create([
            'name' => $first_name.$last_name,
            'email' => $email,
            'user_type'=>$user_type,
            'password' => Hash::make($password),
        ]);
        
        $id=$user1->id;

        if($user_type =='company'){

            $bussiness_name=$data['bussiness_name'];
            $company->user_id=$id;
            $company->first_name=$first_name;
            $company->last_name=$last_name;
            $company->email=$email;
            $company->bussiness_name=$bussiness_name;
            
            $company->save(); 
             
        }

        if($user_type=='applicant'){
            $applicant->user_id=$id;
            $applicant->first_name= $first_name;
            $applicant->last_name= $last_name;
            $applicant->email= $email;
            $applicant->save();
            
        }
        return $user1;
    }
}
