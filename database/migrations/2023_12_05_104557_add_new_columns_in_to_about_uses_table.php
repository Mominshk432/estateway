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
        Schema::table('about_uses', function (Blueprint $table) {
            $table->text('heading')->nullable()->after('id');
            $table->text('subheading')->nullable()->after('heading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('to_about_uses', function (Blueprint $table) {
            //
        });
    }
};
