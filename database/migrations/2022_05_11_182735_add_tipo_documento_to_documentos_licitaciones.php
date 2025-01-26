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
        Schema::table('documentos_licitaciones', function (Blueprint $table) {
            $table->string('tipo_documento')->after('documento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos_licitaciones', function (Blueprint $table) {
            $table->dropColumn('tipo_documento');
        });
    }
};
