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
        Schema::create('agencia_unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_proveedor')->nullable(false);
            $table->string('razon_social')->nullable();
            $table->string('contacto')->nullable();
            $table->string('puesto')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            // $table->foreign('iduserCreated')->references('id')->on('users');
            // $table->foreign('iduserUpdated')->references('id')->on('users');
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
        Schema::dropIfExists('agencia_unidad');
    }
};
