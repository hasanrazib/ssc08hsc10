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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default('0');
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
