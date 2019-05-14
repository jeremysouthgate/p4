<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationTable extends Migration
{
    // Run the migrations.
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->binary('portrait')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->char('gender');
            $table->date('date_of_birth');
            $table->string('phone_number');
        });
    }

    // Reverse the migrations.
    public function down()
    {
        Schema::dropIfExists('user_information');
    }
}
