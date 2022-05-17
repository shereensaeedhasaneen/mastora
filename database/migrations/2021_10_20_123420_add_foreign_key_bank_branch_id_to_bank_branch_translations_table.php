<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyBankBranchIdToBankBranchTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_branch_translations', function (Blueprint $table) {
            $table->bigInteger('bank_branch_id')->unsigned();
            $table->foreign('bank_branch_id')->references('id')->on('countries')->onDelete('CASCADE');
            $table->unique(['bank_branch_id', 'locale']);
        });
    }

    /**  
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_branch_translations', function (Blueprint $table) {
            $table->dropForeign('bank_branch_translations_bank_branch_id_foreign');
            $table->dropUnique('bank_branch_translations_bank_branch_id_locale_unique');
            $table->dropColumn('bank_branch_id');
        });
    }
}
