<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('website');
            $table->string('tel');
            $table->longText('description');
            $table->string('ticket_info');
            $table->longText('traffic_info');
            $table->string('parking_info');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')
                    ->references('id')
                    ->on('attraction_positions')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('opentime_id');
            $table->foreign('opentime_id')
                    ->references('id')
                    ->on('attraction_opentimes')
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
        Schema::dropIfExists('attractions');
    }
}
