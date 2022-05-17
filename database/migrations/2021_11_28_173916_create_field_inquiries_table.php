<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('project_type');
            $table->integer('project_cost');
            $table->integer('project_revenue');
            $table->integer('project_period');
            $table->integer('rent')->nullable();
            $table->text('project_description');
            $table->text('home_description');
            $table->boolean('reputation');
            $table->boolean('permanent');
            $table->boolean('is_owner');
            $table->foreignId('loan_id');
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
        Schema::dropIfExists('field_inquiries');
    }
}
