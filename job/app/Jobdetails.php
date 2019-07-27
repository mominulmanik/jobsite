<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobdetails extends Model
{
    protected $table = 'jobdetails';
    protected $fillable = [
       'company_id', 'job_title', 'job_description','salary','job_location','country',
    ];
}
