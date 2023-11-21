<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('drives', function (Blueprint $table) {
            $table->id();
            $table->string("title" , 200);
            $table->string("description" , 300);
            $table->text("file");
            $table->string("status")->default("private");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references('id')->on("users");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('drives');
    }
};
