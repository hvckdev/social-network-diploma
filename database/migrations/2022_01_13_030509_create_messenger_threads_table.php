<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class fCreateMessengerThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('messenger_threads', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_user_id');
            $table->unsignedBigInteger('second_user_id');
            $table->unique(['first_user_id','second_user_id']);
            $table->boolean('is_block')->default('0');
            $table->unsignedBigInteger('blocked_by')->nullable();
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
        Schema::dropIfExists('messenger_threads');
    }
}
