<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactedUsersTable extends Migration
{
    public function up()
    {
        Schema::create('contacted_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('jobpost_id');
            $table->text('description');
            $table->timestamp('contacted_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user_responses')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('jobpost_id')->references('id')->on('job_postings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacted_users');
    }
}

