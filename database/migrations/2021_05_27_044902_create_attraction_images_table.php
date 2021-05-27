<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('image_desc');

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
        Schema::dropIfExists('attraction_images');
    }
}
