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
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->foreignId("introducer")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("introduced")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger("status")->comment("0 is not userd and 1 is used");
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
        Schema::dropIfExists('rewards');
    }
};
