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
        Schema::create('contact_us_texts', function (Blueprint $table) {
            $table->id();
            $table->string("title_1");
            $table->string("title_2");
            $table->string("title_3")->nullable();
            $table->text("text_1");
            $table->text("text_2");
            $table->text("text_3")->nullable();
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
        Schema::dropIfExists('contact_us_texts');
    }
};
