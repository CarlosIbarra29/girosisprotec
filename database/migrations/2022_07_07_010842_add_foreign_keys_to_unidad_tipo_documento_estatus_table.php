<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUnidadTipoDocumentoEstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidad_tipo_documento_estatus', function (Blueprint $table) {
            $table->foreign(['iduserCreated'], 'fk_unidad_tipo_documento_estatus_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['iduserUpdated'], 'fk_unidad_tipo_documento_estatus_users2')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidad_tipo_documento_estatus', function (Blueprint $table) {
            $table->dropForeign('fk_unidad_tipo_documento_estatus_users1');
            $table->dropForeign('fk_unidad_tipo_documento_estatus_users2');
        });
    }
}
