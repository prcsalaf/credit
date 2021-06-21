<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCredits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('tbl_credits', function (Blueprint $table) {
            $table->id("id_cred");
            $table->string('cin' ,25);
            $table->string('nom' ,25);
            $table->string('prenom' ,25);
            $table->date('date_nes' );
            $table->string('project' ,25);
            $table->string('type' ,25);
            $table->double('montant');
            $table->double('monsualite');
            $table->integer('duree');
            $table->double('credit_encour'  );
            $table->integer('nombre_pr');
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
        Schema::dropIfExists('tbl_credits');
    }
}
