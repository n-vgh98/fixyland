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
        Schema::create('discount_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId("discount_id")->constrained("discounts")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("order_id")->constrained("orders")->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('discount_users');
    }
};
