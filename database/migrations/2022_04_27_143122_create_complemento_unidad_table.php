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
        Schema::create('complemento_unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unidad')->nullable();
            $table->string('kilometraje')->nullable();
            $table->string('marca_bateria')->nullable();
            $table->string('marca_llantas')->nullable();
            $table->string('rin')->nullable();
            $table->string('motor')->nullable();
            $table->string('vestiduras')->nullable();
            $table->string('llantas')->nullable();
            $table->string('pintura')->nullable();
            $table->string('llanta_refaccion')->nullable();
            $table->string('gato')->nullable();
            $table->string('herramientas')->nullable();
            $table->string('espejo_retrovisor')->nullable();
            $table->string('funciona_motor')->nullable();
            $table->string('llaves_vehiculo')->nullable();
            $table->string('radio')->nullable();
            $table->string('bocinas')->nullable();
            $table->string('aire_acondicionado')->nullable();
            $table->string('birlos')->nullable();
            $table->string('tapetes')->nullable();
            $table->string('senalizaciones')->nullable();
            $table->string('elaboro')->nullable();
            $table->string('observaciones')->nullable();
            $table->integer('conteo_niv')->nullable();
            $table->integer('conteo_year')->nullable();
            $table->string('rango_km')->nullable();
            $table->string('registro_repuve')->nullable();
            $table->date("fecha_ingreso")->nullable();
            $table->date("fecha_salida")->nullable();
            $table->unsignedBigInteger('iduserCreated')->nullable();
            $table->unsignedBigInteger('iduserUpdated')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('udpated_at')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complemento_unidad');
    }
};
