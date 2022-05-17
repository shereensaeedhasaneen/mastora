<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanUserStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_user_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id');
            $table->foreignId('user_id');
            $table->enum('status', ['APPROVED', 'REJECTED' , 'ASSIGNED'])->default('APPROVED');
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
        Schema::dropIfExists('loan_user_statuses');
    }
}
