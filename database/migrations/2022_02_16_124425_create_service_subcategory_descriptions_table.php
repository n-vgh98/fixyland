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
        Schema::create('service_subcategory_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("subcategory_id")->constrained("service_sub_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->text("text_1");
            $table->text("text_2")->nullable();
            $table->text("text_3")->nullable();
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
        Schema::dropIfExists('service_subcategory_descriptions');
    }
};
