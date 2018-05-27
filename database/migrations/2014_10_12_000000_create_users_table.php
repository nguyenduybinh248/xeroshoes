<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('address');
            $table->integer('phone');
            $table->tinyInteger('isadmin');
            $table->string('email');
            $table->string('avatar');
            $table->string('provider');
            $table->string('provider_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('confirm_code');
            $table->tinyInteger('confirmed');
            $table->string('slug');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
