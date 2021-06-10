<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclarationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaration', function (Blueprint $table) {
            $table->id();
            $table->date('dateDeclaration');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idEtat');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idEtat')->references('id')->on('etatdeclaration')->onDelete('cascade');
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
        Schema::dropIfExists('declaration');
    }
}
