<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("ad",200);
            $table->foreignId("category_id");
            $table->foreign("category_id")->references("id")->on("categories");
            $table->longText("icerik");
            $table->json("ekler");
            $table->unsignedInteger("goruntulenme");
            $table->foreignId("users_id");
            $table->foreign("users_id")->references("id")->on("users");
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
        Schema::dropIfExists('projects');
    }
}
