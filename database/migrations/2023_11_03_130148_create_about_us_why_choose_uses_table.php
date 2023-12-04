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
        Schema::create('about_us_why_choose_uses', function (Blueprint $table) {
            $table->id();
            $table->text('heading_1')->nullable();
            $table->longText('content_1')->nullable();
            $table->text('heading_2')->nullable();
            $table->longText('content_2')->nullable();
            $table->text('heading_3')->nullable();
            $table->longText('content_3')->nullable();
            $table->text('heading_4')->nullable();
            $table->longText('content_4')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();
        });

        \App\Models\about_us_why_choose_us::create([
            'heading_1' => '',
            'content_1' => '',
            'heading_2' => '',
            'content_2' => '',
            'heading_3' => '',
            'content_3' => '',
            'heading_4' => '',
            'content_4' => '',
            'image' => '',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us_why_choose_uses');
    }
};
