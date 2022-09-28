<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default('0');
            $table->integer('blood_id')->default('0');
            $table->integer('gender_id')->default('0');
            $table->integer('marital_id')->default('0');
            $table->string('job_title')->default('Add Job Title');
            $table->string('company_name')->default('Add Company Name');
            $table->integer('job_industry_id')->default('0');
            $table->text('company_location')->default('Add Company Location');
            $table->string('university_name')->default('Add University');
            $table->string('college_name')->default('Add College');
            $table->string('school_name')->default('Add School');
            $table->text('present_address_line')->default('Update Your Present Address Line');
            $table->integer('present_subdistrict_id')->default('0');
            $table->integer('present_district_id')->default('0');
            $table->integer('present_division_id')->default('0');
            $table->text('permanent_address_line')->default('Update Your Permanent Address Line');
            $table->integer('permanent_subdistrict_id')->default('0');
            $table->integer('permanent_district_id')->default('0');
            $table->integer('permanent_division_id')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
