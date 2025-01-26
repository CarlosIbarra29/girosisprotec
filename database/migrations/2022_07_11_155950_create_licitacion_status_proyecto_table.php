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
        Schema::create('licitacion_status_proyecto', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('estatus')->nullable();
            $table->integer('status_delete')->default('0');
            $table->timestamps();
            $table->unsignedBigInteger('iduserCreated')->index('fk_licitacion_status_proyecto_users1_idx');
            $table->unsignedBigInteger('iduserUpdated')->nullable()->index('fk_licitacion_status_proyecto_users2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licitacion_status_proyecto');
    }
};
