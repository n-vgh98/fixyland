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
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("form_id")->constrained("forms")->onDelete("cascade")->onUpdate("cascade");
            $table->text("label");
            $table->tinyInteger("input_type")->comment("0 is text and 1 is select");
            $table->tinyInteger("status")->default(1)->comment("0 is deactive and 1 is active");
            $table->text("option_1")->nullable();
            $table->text("option_2")->nullable();
            $table->text("option_3")->nullable();
            $table->text("option_4")->nullable();
            $table->text("option_5")->nullable();
            $table->text("option_6")->nullable();
            $table->text("option_7")->nullable();
            $table->text("option_8")->nullable();
            $table->text("option_9")->nullable();
            $table->text("option_10")->nullable();
            $table->text("option_11")->nullable();
            $table->text("option_12")->nullable();
            $table->text("option_13")->nullable();
            $table->text("option_14")->nullable();
            $table->text("option_15")->nullable();
            $table->text("option_16")->nullable();
            $table->text("option_17")->nullable();
            $table->text("option_18")->nullable();
            $table->text("option_19")->nullable();
            $table->text("option_20")->nullable();
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
        Schema::dropIfExists('inputs');
    }
};
