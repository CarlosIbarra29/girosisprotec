<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadTipoDocumentoEstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_tipo_documento_estatus', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('estatus', 75);
            $table->timestamps();
            $table->unsignedBigInteger('iduserCreated')->index('fk_unidad_tipo_documento_estatus_users1_idx');
            $table->unsignedBigInteger('iduserUpdated')->nullable()->index('fk_unidad_tipo_documento_estatus_users2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_tipo_documento_estatus');
    }
}
