<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyecto_documento', function (Blueprint $table) {
            $table->foreign(['id_proyecto'], 'fk_proyecto_documento_proyectos1')->references(['id'])->on('proyectos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_proyecto_tipo_documento'], 'fk_proyecto_documento_proyecto_tipo_documento1')->references(['id'])->on('proyecto_tipo_documento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['iduserCreated'], 'fk_proyecto_documento_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['iduserUpdated'], 'fk_proyecto_documento_users2')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyecto_documento', function (Blueprint $table) {
            $table->dropForeign('fk_proyecto_documento_proyectos1');
            $table->dropForeign('fk_proyecto_documento_proyecto_tipo_documento1');
            $table->dropForeign('fk_proyecto_documento_users1');
            $table->dropForeign('fk_proyecto_documento_users2');
        });
    }
}
