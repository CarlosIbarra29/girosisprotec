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
            $table->string('empresa_dependencia')->after('folio_num')->nullable();
            $table->string('no_licitacion')->after('empresa_dependencia')->nullable();
            $table->date('fecha_visita')->after('no_licitacion')->nullable();
            $table->string('junta_aclaraciones')->after('fecha_visita')->nullable();
            $table->string('apertura_proposiciones')->after('junta_aclaraciones')->nullable();
            $table->string('acto_fallo')->after('apertura_proposiciones')->nullable();
            $table->string('participacion_conjunta')->after('acto_fallo')->nullable();
            $table->string('publicacion_licitacion')->after('participacion_conjunta')->nullable();
            $table->string('monto_ofertado')->after('publicacion_licitacion')->nullable();
            $table->string('monto_ganado')->after('monto_ofertado')->nullable();
            $table->string('monto_fianza')->after('monto_ganado')->nullable();
            $table->string('porcentaje_efectividad')->after('monto_fianza')->nullable();
            $table->string('firma_entrega')->after('porcentaje_efectividad')->nullable();
            $table->date('fecha_entrega')->after('firma_entrega')->nullable();
            $table->date('fecha_cierre')->after('fecha_entrega')->nullable();
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
            $table->dropColumn('empresa_dependencia');
            $table->dropColumn('no_licitacion');
            $table->dropColumn('fecha_visita');
            $table->dropColumn('junta_aclaraciones');
            $table->dropColumn('apertura_proposiciones');
            $table->dropColumn('acto_fallo');
            $table->dropColumn('participacion_conjunta');
            $table->dropColumn('publicacion_licitacion');
            $table->dropColumn('monto_ofertado');
            $table->dropColumn('monto_ganado');
            $table->dropColumn('monto_fianza');
            $table->dropColumn('porcentaje_efectividad');
            $table->dropColumn('firma_entrega');
            $table->dropColumn('fecha_entrega');
            $table->dropColumn('fecha_cierre');
        });
    }
};
