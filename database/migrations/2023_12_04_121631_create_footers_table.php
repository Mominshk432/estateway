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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->text('heading')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('f_link')->nullable();
            $table->text('t_link')->nullable();
            $table->text('ig_link')->nullable();
            $table->timestamps();
        });

        \App\Models\Footer::create([
            'heading' => 'Lorem Ipsum',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'address' => 'Lorem ipsum dolor sit amet, consectetur
adipiscing elit. ',
            'phone' => '+91 9999888877',
            'email' => 'Loremipsum@gamil.com',
            'f_link' => '#',
            't_link' => '#',
            'ig_link' => '#',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footers');
    }
};
