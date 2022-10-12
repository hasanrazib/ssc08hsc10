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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_name')->nullable();
            $table->string('property_mobile')->nullable();
            $table->string('property_phone')->nullable();
            $table->string('property_email')->nullable();
            $table->string('property_website')->nullable();
            $table->text('property_address')->nullable();
            $table->text('property_shortdescription')->nullable();
            $table->text('property_description')->nullable();
            $table->integer('property_owner_id')->nullable();
            $table->integer('property_category_id')->nullable();
            $table->tinyInteger('property_status')->default('0');
            $table->string('property_logo')->nullable();
            $table->string('property_cover')->nullable();
            $table->text('property_map')->nullable();
            $table->string('property_facebook_page')->nullable();
            $table->string('property_instagram_page')->nullable();
            $table->string('property_linkedin_page')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('properties');
    }
};
