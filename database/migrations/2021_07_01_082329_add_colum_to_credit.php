<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumToCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_credits', function (Blueprint $table) {
            $table->text('Relev_banq')->after('nombre_pr');
            $table->text('fichie_paie')->after('nombre_pr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_credits', function (Blueprint $table) {
            //
        });
    }
}
