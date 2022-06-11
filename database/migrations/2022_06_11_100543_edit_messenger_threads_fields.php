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
        Schema::table('messenger_threads', function (Blueprint $table) {
            $table->unsignedBigInteger('first_user_id')->change();
            $table->unsignedBigInteger('second_user_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messenger_threads', function (Blueprint $table) {
            //
        });
    }
};
