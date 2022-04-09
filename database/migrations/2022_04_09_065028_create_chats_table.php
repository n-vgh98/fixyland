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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("archive_id")->constrained("archives")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("user_1")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("user_2")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger("status")->default(1)->comment("1 is active and 0 is deactive");
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
        Schema::dropIfExists('chats');
    }
};
