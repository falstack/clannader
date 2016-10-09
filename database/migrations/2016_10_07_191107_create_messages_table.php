<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method');
            $table->unsignedInteger('about_id');
            $table->string('about_type');
            $table->unsignedInteger('from_id')->default(0)->nullable();
            $table->string('from_type')->nullable();
            $table->unsignedInteger('target_id');
            $table->unsignedInteger('attack_id');
            $table->boolean('read')->default(0);
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
        Schema::dropIfExists('messages');
    }
}
