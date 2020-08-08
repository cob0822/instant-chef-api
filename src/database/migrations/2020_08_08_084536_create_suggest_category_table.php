<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('suggest_category');
        Schema::create('suggest_category', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('suggest_id')->index();
            $table->unsignedInteger('category_id')->index();
            $table->timestamps();

            $table->foreign('suggest_id')
                ->references('id')->on('suggests')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suggest_category');
    }
}
