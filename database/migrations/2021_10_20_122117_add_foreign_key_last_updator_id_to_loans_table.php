<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyLastUpdatorIdToLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->bigInteger('last_updater_id')
            ->unsigned()
            ->nullable();
        $table->foreign('last_updater_id')
            ->references('id')
            ->on('users')
            ->onDelete('SET NULL');//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropForeign('loans_last_updater_id_foreign');
            $table->dropColumn('last_updater_id');
        });
    }
}
