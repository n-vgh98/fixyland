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
        Schema::create('tech_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tech_id")->nullable()->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->string("star_number");
            $table->text("description")->nullable();
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
        Schema::dropIfExists('tech_scores');
    }
};
