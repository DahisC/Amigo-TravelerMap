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
            $table->string('name')->unique();
            $table->string('website')->nullable();
            $table->string('tel')->nullable();
            $table->longText('description');
            $table->string('ticket_info');
            $table->longText('traffic_info');
            $table->string('parking_info')->nullable();

            $table->unsignedBigInteger('user_id')->default('0')->index();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('position_id')->index();
            $table->foreign('position_id')
                    ->references('id')
                    ->on('attraction_positions')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('opentime_id')->index();
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
