<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('rfc', 15)->unique();
            $table->string('razon_social', 45)->unique();
            $table->string('alias', 45)->unique();
            $table->string('calle_numero', 45);
            $table->string('colonia', 20);
            $table->unsignedInteger('codigo_postal')->unique();
            $table->integer('id_municipio')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_municipio')->references('id_municipio')->on('municipio');
            $table->foreign('id_estado')->references('id_estado')->on('estado');
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
        Schema::dropIfExists('client');
    }
};
