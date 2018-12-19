<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMqttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mqtt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string("user");
            $table->string("password");
            $table->string("ip");
            $table->string("port");
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mqtt');
    }
}
