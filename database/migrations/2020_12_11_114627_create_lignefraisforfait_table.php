<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignefraisforfaitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignefraisforfait', function (Blueprint $table) {
            $table->unsignedBigInteger('idDeclaration');
            $table->unsignedBigInteger('idFraisForfait');
            $table->integer('quantite');
            $table->boolean('valide');
            $table->primary(array('idDeclaration', 'idFraisForfait'));
            $table->foreign('idDeclaration')->references('id')->on('declaration')->onDelete('cascade');
            $table->foreign('idFraisForfait')->references('id')->on('fraisforfait')->onDelete('cascade');
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
        Schema::dropIfExists('lignefraisforfait');
    }
}
