<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_times', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('attraction_id')->index();
            $table->foreign('attraction_id')
                    ->references('id')
                    ->on('attractions')
                    ->onDelete('cascade');

            $table->string('startDate');
            $table->integer('start_year');
            $table->integer('start_month');
            $table->integer('start_day');
            $table->string('endDate');
            $table->integer('end_year');
            $table->integer('end_month');
            $table->integer('end_day');
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
        Schema::dropIfExists('attraction_times');
    }
}
