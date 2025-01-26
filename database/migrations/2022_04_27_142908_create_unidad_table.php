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
        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio')->nullable();
            $table->integer('id_ubicacion')->nullable();
            $table->date("fecha")->nullable();
            $table->integer('id_marca')->nullable();
            $table->integer('id_modelo')->nullable();
            $table->integer('unidad_year')->nullable();
            $table->string('no_serie')->nullable();
            $table->string('placa')->nullable();
            $table->string('transmision')->nullable();
            $table->string('no_tarjeta_circulacion')->nullable();
            $table->string('no_poliza_seguro')->nullable();
            $table->date("fecha_vencimiento_poliza")->nullable();
            $table->integer('id_aseguradora')->nullable();
            $table->string('numero_inventario')->nullable();
            $table->string('color')->nullable();
            $table->integer('id_status')->default('0');
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
        Schema::dropIfExists('unidad');
    }
};
