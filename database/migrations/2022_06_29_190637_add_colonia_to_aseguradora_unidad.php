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
        Schema::table('aseguradora_unidad', function (Blueprint $table) {
            $table->string('nombre_contacto')->after('nombre_aseguradora')->nullable();
            $table->string('email_contacto')->after('nombre_contacto')->nullable();
            $table->integer('telefono_contacto')->after('email_contacto')->nullable();
            $table->string('calle')->after('telefono_contacto')->nullable();
            $table->string('colonia')->after('calle')->nullable();
            $table->integer('cp')->after('colonia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aseguradora_unidad', function (Blueprint $table) {
            $table->dropColumn('nombre_contacto');
            $table->dropColumn('email_contacto');
            $table->dropColumn('telefono_contacto');
            $table->dropColumn('calle');
            $table->dropColumn('colonia');
            $table->dropColumn('cp');
        });
    }
};
