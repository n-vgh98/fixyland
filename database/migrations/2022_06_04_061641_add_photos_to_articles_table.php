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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('photo_path_2')->nullable();
            $table->string('photo_alt_2')->nullable();
            $table->string('photo_name_2')->nullable();
            $table->string('photo_path_3')->nullable();
            $table->string('photo_alt_3')->nullable();
            $table->string('photo_name_3')->nullable();
            $table->string('photo_path_4')->nullable();
            $table->string('photo_alt_4')->nullable();
            $table->string('photo_name_4')->nullable();
            $table->string('photo_path_5')->nullable();
            $table->string('photo_alt_5')->nullable();
            $table->string('photo_name_5')->nullable();
            $table->string('photo_path_6')->nullable();
            $table->string('photo_alt_6')->nullable();
            $table->string('photo_name_6')->nullable();
            $table->string('photo_path_7')->nullable();
            $table->string('photo_alt_7')->nullable();
            $table->string('photo_name_7')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
