<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    // Run the migrations.
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address');
            $table->string('token');
            $table->timestamps();
        });
    }

    // Reverse the migrations.
    public function down()
    {
        Schema::dropIfExists('logins');
    }
}
