<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 32);
            $table->string('middle_name', 32);
            $table->string('last_name', 32);
            $table->string('city', 32);
            $table->string('country', 32);
            $table->string('website', 128);
            $table->boolean('show_middle_name');
            $table->boolean('show_city');
            $table->boolean('show_country');
            $table->boolean('show_email');
            $table->boolean('show_website');
            $table->dateTime('visited_at');
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
        Schema::dropIfExists('user_information');
    }
}
