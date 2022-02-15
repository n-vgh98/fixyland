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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->text("text");
            $table->tinyInteger("mode")->comment("0 is public 1 is private");
            $table->text("receivers")->comment("superadmins,admins,technicians,users or receiver name");
            $table->foreignId("sender_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("receiver_id")->nullable()->constrained("users")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('notifications');
    }
};
