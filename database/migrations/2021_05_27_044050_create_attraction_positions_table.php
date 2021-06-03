<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_positions', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('region');
            $table->string('town');
            $table->string('address');
            $table->decimal('px');
            $table->decimal('py');

            $table->unsignedBigInteger('attraction_id')->index();
            $table->foreign('attraction_id')
                ->references('id')
                ->on('attractions')
                ->onDelete('cascade');


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
        Schema::dropIfExists('attraction_positions');
    }
}
