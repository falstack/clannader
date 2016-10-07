<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangumisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangumis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('summary');
            $table->string('avatar');
            $table->string('banner');
            $table->unsignedInteger('follower')->default(0);
            $table->float('score', 5);
            $table->softDeletes();
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
        Schema::dropIfExists('bangumis');
    }
}
