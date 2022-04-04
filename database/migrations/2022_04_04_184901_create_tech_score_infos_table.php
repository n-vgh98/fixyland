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
        Schema::create('tech_score_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("score_id")->nullable()->constrained("tech_scores")->onDelete("cascade")->onUpdate("cascade");
            $table->text("information");
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
        Schema::dropIfExists('tech_score_infos');
    }
};
