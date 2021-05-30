<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_tag', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('attraction_id')->index();
            $table->foreign('attraction_id')
                    ->references('id')
                    ->on('attractions')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('tag_id')->index();
            $table->foreign('tag_id')
                    ->references('id')
                    ->on('tags')
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
        Schema::dropIfExists('attraction_tag');
    }
}
