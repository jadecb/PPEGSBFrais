<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignefraishorsforfaitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignefraishorsforfait', function (Blueprint $table) {
            $table->id();
            $table->boolean('valide');
            $table->date('date');
            $table->double('montant');
            $table->string('libelle');
            $table->unsignedBigInteger('idDeclaration');
            $table->foreign('idDeclaration')->references('id')->on('declaration')->onDelete('cascade');
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
        Schema::dropIfExists('lignefraishorsforfait');
    }
}
