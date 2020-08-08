<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('suggests');
        Schema::create('suggests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedInteger('order_id')->index();
            $table->string('name');
            $table->string('photo_original');
            $table->string('photo_encrypt');
            $table->integer('time_required');
            $table->integer('total_price')->nullable();
            $table->tinyInteger('best_answer')->default(0);
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');
            $table->foreign('order_id')
                ->references('id')->on('orders')
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
        Schema::dropIfExists('suggests');
    }
}
