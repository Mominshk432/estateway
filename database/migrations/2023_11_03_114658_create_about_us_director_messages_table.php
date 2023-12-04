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
        Schema::create('about_us_director_messages', function (Blueprint $table) {
            $table->id();
            $table->text('heading')->nullable();
            $table->text('subheading')->nullable();
            $table->text('image')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        \App\Models\about_us_director_message::create([
            'heading' => '',
            'subheading' => '',
            'image' => '',
            'description' => ''
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us_director_messages');
    }
};
