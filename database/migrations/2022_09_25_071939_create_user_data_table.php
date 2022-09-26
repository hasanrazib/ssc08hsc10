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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('present_address_line')->nullable();
            $table->integer('present_subdistrict_id')->nullable();
            $table->integer('present_district_id')->nullable();
            $table->integer('present_division_id')->nullable();
            $table->text('permanent_address_line')->nullable();
            $table->integer('permanent_subdistrict_id')->nullable();
            $table->integer('permanent_district_id')->nullable();
            $table->integer('permanent_division_id')->nullable();
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
        Schema::dropIfExists('user_data');
    }
};
