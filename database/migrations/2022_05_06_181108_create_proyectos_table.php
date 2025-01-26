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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_emisor')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->string('no_folio')->nullable();
            $table->string('titulo_servicio')->nullable();
            $table->integer('tipo_contrato')->nullable();
            $table->string('nombre_administrativo')->nullable();
            $table->string('correo_administrativo')->nullable();
            $table->string('telefono_administrativo')->nullable();
            $table->integer('id_responsable')->nullable();
            $table->integer('fuente_proyecto')->nullable();
            $table->date("firma_contrato")->nullable();
            $table->date("firma_inicio_vigencia")->nullable();
            $table->date("firma_final_vigencia")->nullable();
            $table->string('presupuesto_minimo')->nullable();
            $table->string('presupuesto_maximo')->nullable();
            $table->integer('id_status')->default('0');
            $table->integer('id_status_delete')->default('0');
            $table->unsignedBigInteger('iduserCreated')->nullable();
            $table->unsignedBigInteger('iduserUpdated')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
};
