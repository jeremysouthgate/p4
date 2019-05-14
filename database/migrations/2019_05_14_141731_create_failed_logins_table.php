<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFailedLoginsTable extends Migration
{
    // Run the migrations.
    public function up()
    {
        Schema::create('failed_logins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address');
            $table->timestamps();
        });
    }

    // Reverse the migrations.
    public function down()
    {
        Schema::dropIfExists('failed_logins');
    }
}
