<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_sliders', function (Blueprint $table) {
            $table->id();
            $table->text("photo_path");
            $table->text("alt");
            $table->text("title");
            $table->tinyInteger("status")->default(1)->comment("0 is deactive 1 is active");
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
        Schema::dropIfExists('index_sliders');
    }
};
