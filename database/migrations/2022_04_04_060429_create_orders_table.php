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
            $table->foreignId("order_address_id")->nullable()->constrained("order_addresses")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("address_id")->nullable()->constrained("addresses")->onDelete("cascade")->onUpdate("cascade");
            $table->text("description");
            $table->string("date");
            $table->string("time");
            $table->tinyInteger("show_info")->comment("0 is no and 1 is yes");
            $table->tinyInteger("status")->default(1)->comment("0 is cancle and 1 is send for process");
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
