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
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tech_id")->nullable()->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("order_id")->constrained("orders")->onDelete("cascade")->onUpdate("cascade");
            $table->tinyInteger("status")->default(1)->comment("0 is  canceled and 1 waiting to accpet  and 2 is accepted");
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
        Schema::dropIfExists('suggestions');
    }
};
