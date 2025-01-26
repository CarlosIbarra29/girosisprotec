<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadTipoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_tipo_documento', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('id_unidad_tipo_documento_estatus')->index('fk_unidad_tipo_documento_unidad_tipo_documento_estatus1_idx');
            $table->string('tipo');
            $table->timestamps();
            $table->unsignedBigInteger('iduserCreated')->index('fk_unidad_tipo_documento_users1_idx');
            $table->unsignedBigInteger('iduserUpdated')->nullable()->index('fk_unidad_tipo_documento_users2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_tipo_documento');
    }
}
