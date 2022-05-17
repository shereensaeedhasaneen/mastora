<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_research', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id');
            $table->boolean('is_owner');
            $table->boolean('is_shared_bathroom');
            $table->integer('rent')->nullable();
            $table->integer('number_of_rooms');
            $table->integer('houes_status');
            $table->integer('furniture_status');
            $table->text('house_needs');
            $table->text('furniture_description');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('social_research');
    }
}
