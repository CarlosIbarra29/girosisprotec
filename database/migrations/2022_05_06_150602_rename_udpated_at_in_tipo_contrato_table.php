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
        Schema::table('tipo_contrato', function (Blueprint $table) {
            $table->renameColumn('udpated_at', 'updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipo_contrato', function (Blueprint $table) {
            $table->renameColumn('udpated_at', 'updated_at');
        });
    }
};
