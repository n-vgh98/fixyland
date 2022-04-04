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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("service_id")->constrained("service_sub_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("order_address_id")->constrained("order_addresses")->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->foreignId("address_id")->constrained("addresses")->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->text("description");
            $table->string("date");
            $table->string("time");
            $table->tinyInteger("show_info")->comment("0 is no and 1 is yes");
            $table->tinyInteger("done")->comment("0 is not Accepted and 1 is Accepted");
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
        Schema::dropIfExists('orders');
    }
};
