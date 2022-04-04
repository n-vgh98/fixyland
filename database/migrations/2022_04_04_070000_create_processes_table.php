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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tech_id")->nullable()->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("order_id")->constrained("orders")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("service_id")->constrained("service_sub_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->tinyInteger("status")->default(1)->comment("0 is  canceled and 1 is prosessing and 2 is accepted and then tech id fill");

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
        Schema::dropIfExists('processes');
    }
};
