<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_uniqe_id')->unique();
            $table->string('name');
            $table->string('national_id');
            $table->string('type')->nullable();
            $table->integer('price')->nullable();
            $table->integer('payment_period')->default(1);
            $table->integer('depit_value')->nullable();
            $table->string('guarantor')->nullable();
            $table->integer('number_of_installments')->default(0);
            $table->string('phone_number')->nullable();
            $table->string('land_line_number')->nullable();
            $table->string('number_of_insurance')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('social_status')->nullable();
            $table->foreignId('bank_branch_id');
            $table->foreignId('country_id');
            $table->foreignId('user_id')->nullable();
            $table->integer('status')->default(2);
            $table->integer('number_of_children')->nullable();
            $table->integer('exeption_period')->default(0);
            $table->boolean('have_special_case')->default(0);
            $table->text('description')->nullable();
            $table->boolean('have_experince')->nullable();
            $table->integer('number_of_experice_years')->default(0) ->nullable();
            $table->boolean('is_owner_project')->default(1);
            $table->string('address_project')->nullable();
            $table->string('applicant_address')->nullable();
            $table->integer('guarantor_type')->nullable();
            $table->boolean('is_draft')->default(1);
            $table->string('national_id_front_file')->nullable();
            $table->string('national_id_end_file')->nullable();
            $table->string('home_service_file')->nullable();
            $table->string('rent_file')->nullable();
            $table->string('partner_file')->nullable();
            $table->string('price_file')->nullable();
            $table->boolean('is_done_submit')->default(0);
            $table->text('notes')->nullable();
            $table->integer('partner_id')->nullable();
            $table->integer('assigned_id')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
