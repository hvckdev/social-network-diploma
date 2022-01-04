<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
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
            $table->unsignedBigInteger('user_id')->index();
            $table->string('first_name', 32);
            $table->string('middle_name', 32)->nullable();
            $table->string('last_name', 32);
            $table->string('city', 32);
            $table->string('country', 32);
            $table->string('website', 128)->nullable();
            $table->date('birthday');
            $table->boolean('show_middle_name')->default(0);
            $table->boolean('show_city')->default(0);
            $table->boolean('show_country')->default(0);
            $table->boolean('show_email')->default(0);
            $table->boolean('show_website')->default(0);
            $table->boolean('show_birthday')->default(0);
            $table->dateTime('visited_at')->useCurrent();
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
