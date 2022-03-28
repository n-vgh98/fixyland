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
        Schema::create('tech_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("covered_state_id")->constrained("covered_area")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("covered_city_id")->constrained("covered_area_cities")->onDelete("cascade")->onUpdate("cascade");
            $table->string("citizen_code");
            $table->string("postal_code");
            $table->string("pelak");
            $table->tinyInteger("health_status")->comment("0 is not healty and 1 is healthy");
            $table->text("health_description")->nullable()->comment("if its not healthy");
            $table->string("birthday");
            $table->tinyInteger("gender")->comment("0 is mail and 1 is female");
            $table->tinyInteger("status")->comment("0 is not confirmed and 1 is confirming and 2 is confirmed");
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
        Schema::dropIfExists('tech_infos');
    }
};
