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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('text_1');
            $table->text('text_2')->nullable();
            $table->text('text_3')->nullable();
            $table->text('v_link_1')->nullable();
            $table->text('v_link_2')->nullable();
            $table->string('photo_path');
            $table->string('photo_alt');
            $table->string('photo_name');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->integer('views')->default(0);
            $table->tinyinteger('status')->default(1);
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->foreignId("category_id")->constrained("article_categories")->onDelete("cascade");
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
        Schema::dropIfExists('articles');
    }
};
