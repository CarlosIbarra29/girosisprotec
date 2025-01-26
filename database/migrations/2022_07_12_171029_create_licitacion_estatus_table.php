<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitacionEstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacion_estatus', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->unsignedBigInteger('iduserCreated')->nullable()->index('fk_licitacion_estatus_users1_idx');
            $table->unsignedBigInteger('iduserUpdated')->nullable()->index('fk_licitacion_estatus_users2_idx');
            $table->string('estatus', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licitacion_estatus');
    }
}
