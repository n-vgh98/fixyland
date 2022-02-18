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
        Schema::create('footer_informations', function (Blueprint $table) {
            $table->id();
            $table->text("address");
            $table->string("phone_number");
            $table->string("mobile_number")->nullable();
            $table->string("facebook_link")->nullable();
            $table->string("linkedin_link")->nullable();
            $table->string("instagram_link")->nullable();
            $table->string("email_link")->nullable();
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
        Schema::dropIfExists('footer_informations');
    }
};
