<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyCreatorIdToPersonGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person_guarantors', function (Blueprint $table) {
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
        Schema::table('person_guarantors', function (Blueprint $table) {
            $table->dropForeign('person_guarantors_creator_id_foreign');
            $table->dropColumn('creator_id');
        });
    }
}
