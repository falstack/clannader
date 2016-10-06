<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('content');
            $table->string('hash');
            $table->unsignedInteger('link_id');
            $table->string('link_type');
            $table->unsignedInteger('root_id')->default(0)->nullable();
            $table->string('root_type')->default(0)->nullable();
            $table->unsignedInteger('target_id')->default(0);
            $table->unsignedInteger('talk')->default(0);
            $table->unsignedInteger('like')->default(0);
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
        Schema::dropIfExists('comments');
    }
}
