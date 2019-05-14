<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    // Run the migrations.
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('salt');
            $table->string('hash');
            $table->string('activation_status');
            $table->timestamps();
        });
    }

    // Reverse the migrations.
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
