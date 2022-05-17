<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_owner');
            $table->integer('rent')->nullable();
            $table->integer('number_of_rooms');
            $table->boolean('is_shared_bathroom');
            $table->integer('houes_status');
            $table->integer('furniture_status');
            $table->text('house_needs');
            $table->text('furniture_description');
            $table->text('notes');
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
        Schema::dropIfExists('houses');
    }
}
