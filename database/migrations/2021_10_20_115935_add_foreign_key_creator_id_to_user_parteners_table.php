<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyCreatorIdToUserPartenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_parteners', function (Blueprint $table) {
            $table->bigInteger('creator_id')
            ->unsigned()
            ->nullable();
        $table->foreign('creator_id')
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
            $table->dropForeign('user_parteners_creator_id_foreign');
            $table->dropColumn('creator_id');
        });
    }
}
