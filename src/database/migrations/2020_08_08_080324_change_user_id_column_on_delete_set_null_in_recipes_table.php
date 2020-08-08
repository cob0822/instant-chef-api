<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserIdColumnOnDeleteSetNullInRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recipes');
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->string('name');
            $table->string('photo_original');
            $table->string('photo_encrypt');
            $table->integer('time_required');
            $table->integer('total_price')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
