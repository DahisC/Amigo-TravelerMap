<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapAttractionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_attraction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('map_id');
            $table->foreign('map_id')
                    ->references('id')
                    ->on('maps')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('attraction_id');
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
        Schema::dropIfExists('map_attraction');
    }
}
