<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyLastUpdatorIdToUserPartenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_parteners', function (Blueprint $table) {
            $table->bigInteger('last_updater_id')
            ->unsigned()
            ->nullable();
        $table->foreign('last_updater_id')
            ->references('id')
            ->on('users')
            ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_parteners', function (Blueprint $table) {
            $table->dropForeign('user_parteners_last_updater_id_foreign');
            $table->dropColumn('last_updater_id');
        });
    }
}
