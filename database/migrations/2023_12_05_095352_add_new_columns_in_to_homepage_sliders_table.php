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
        Schema::table('homepage_sliders', function (Blueprint $table) {
            $table->text('slider_link')->nullable()->after('description');
            $table->text('button_one_text')->nullable()->after('slider_link');
            $table->text('button_one_link')->nullable()->after('button_one_text');
            $table->text('button_two_text')->nullable()->after('button_one_link');
            $table->text('button_two_link')->nullable()->after('button_two_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('to_homepage_sliders', function (Blueprint $table) {
            //
        });
    }
};
