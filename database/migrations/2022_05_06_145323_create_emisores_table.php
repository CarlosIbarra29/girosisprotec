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
        Schema::create('emisores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social')->nullable();
            $table->string('rfc')->nullable();
            $table->string('dom_fiscal')->nullable();
            $table->integer('status_delete')->default('0'); 
            $table->unsignedBigInteger('iduserCreated')->nullable();
            $table->unsignedBigInteger('iduserUpdated')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('udpated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emisores');
    }
};
