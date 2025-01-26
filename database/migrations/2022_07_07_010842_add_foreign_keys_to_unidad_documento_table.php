<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUnidadDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidad_documento', function (Blueprint $table) {
            $table->foreign(['id_unidad'], 'fk_unidad_documento_unidad1')->references(['id'])->on('unidad')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_unidad_tipo_documento'], 'fk_unidad_documento_unidad_tipo_documento1')->references(['id'])->on('unidad_tipo_documento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['iduserCreated'], 'fk_unidad_documento_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['iduserUpdated'], 'fk_unidad_documento_users2')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidad_documento', function (Blueprint $table) {
            $table->dropForeign('fk_unidad_documento_unidad1');
            $table->dropForeign('fk_unidad_documento_unidad_tipo_documento1');
            $table->dropForeign('fk_unidad_documento_users1');
            $table->dropForeign('fk_unidad_documento_users2');
        });
    }
}
