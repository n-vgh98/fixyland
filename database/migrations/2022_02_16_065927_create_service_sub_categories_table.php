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
        Schema::create('service_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("service_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->string("name");
            $table->text("photo_path");
            $table->string("alt");
            $table->string("title");
            $table->tinyInteger("status")->default(1)->comment("0 is deactive and 1 is active");
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
        Schema::dropIfExists('service_sub_categories');
    }
};
