<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('heading');
            $table->text('address');
            $table->longText('description');
            $table->longText('highlights');
            $table->longText('amenities');
            $table->integer('category_id');
            $table->integer('no_of_bedrooms');
            $table->integer('no_of_bathrooms');
            $table->integer('size');
            $table->longText('google_map');
            $table->longText('site_plan');
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
        Schema::dropIfExists('projects');
    }
};
