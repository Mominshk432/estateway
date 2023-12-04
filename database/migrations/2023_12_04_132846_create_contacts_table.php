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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('phone')->nullable();
            $table->text('another_phone')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->longText('map_link')->nullable();
            $table->timestamps();
        });

        \App\Models\Contact::create([
            'phone' => '+918877887722',
            'another_phone' => '+918877887722 ',
            'email' => 'loremipsumdolor@gmail.com',
            'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448193.95101920515!2d76.76357332396313!3d28.64428735608882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x37205b715389640!2sDelhi%2C%20India!5e0!3m2!1sen!2s!4v1697459313651!5m2!1sen!2s',
            'address' => 'Lorem ipsum dolor sit amet,
consectetur adipiscing elit',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
