<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_documento', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->unsignedInteger('id_unidad')->index('fk_unidad_documento_unidad1_idx');
            $table->bigInteger('id_unidad_tipo_documento')->index('fk_unidad_documento_unidad_tipo_documento1_idx');
            $table->text('documento');
            $table->string('mime_type', 45)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('iduserCreated')->index('fk_unidad_documento_users1_idx');
            $table->unsignedBigInteger('iduserUpdated')->nullable()->index('fk_unidad_documento_users2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_documento');
    }
}
