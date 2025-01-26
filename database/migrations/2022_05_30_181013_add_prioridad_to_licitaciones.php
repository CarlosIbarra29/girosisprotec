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
        Schema::table('licitaciones', function (Blueprint $table) {
            $table->integer('cliente')->after('empresa_dependencia')->default('0');
            $table->integer('contratacion')->after('no_licitacion')->default('0'); 
            $table->integer('prioridad')->after('status_delete')->default('0'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('licitaciones', function (Blueprint $table) {
            $table->dropColumn('cliente');
            $table->dropColumn('contratacion');
            $table->dropColumn('prioridad');
        });
    }
};
