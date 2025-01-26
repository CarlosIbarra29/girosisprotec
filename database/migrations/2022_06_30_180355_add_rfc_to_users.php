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
        Schema::table('users', function (Blueprint $table) {
            $table->string('rfc')->after('password')->nullable();
            $table->integer('telefono')->after('rfc')->nullable();
            $table->string('ubicacion')->after('telefono')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rfc');
            $table->dropColumn('telefono');
            $table->dropColumn('ubicacion');
        });
    }
};
