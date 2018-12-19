<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('iot_id')->length(10)->unique();
            $table->string('email')->unique();
//            $table->string('image');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('isPremium', ['0', '1'])->default('0')
                ->comment("0 mean is not a premium account");
            $table->date("p_date")->comment("premium expiry date")->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
