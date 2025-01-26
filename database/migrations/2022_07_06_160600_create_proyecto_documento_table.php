<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_documento', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->unsignedInteger('id_proyecto')->index('fk_proyecto_documento_proyectos1_idx');
            $table->bigInteger('id_proyecto_tipo_documento')->index('fk_proyecto_documento_proyecto_tipo_documento1_idx');
            $table->text('documento');
            $table->string('mime_type')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('iduserCreated')->index('fk_proyecto_documento_users1_idx');
            $table->unsignedBigInteger('iduserUpdated')->nullable()->index('fk_proyecto_documento_users2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_documento');
    }
}
