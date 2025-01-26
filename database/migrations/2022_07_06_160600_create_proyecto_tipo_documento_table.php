<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTipoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_tipo_documento', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('tipo');
            $table->timestamps();
            $table->unsignedBigInteger('iduserCreated')->index('fk_proyecto_tipo_documento_users1_idx');
            $table->unsignedBigInteger('iduserUpdated')->nullable()->index('fk_proyecto_tipo_documento_users2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_tipo_documento');
    }
}
