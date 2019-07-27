<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_id');
            $table->string('job_title');
            $table->string('job_description');
            $table->string('salary');
            $table->string('job_location');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobdetails');
    }
}
