<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->date('fecha_entrega');
            $table->date('fecha_mantenimiento');
            $table->string('estado_mantenimiento');
            $table->string('propiedad');
            $table->string('tipo_de_telefono');
            $table->string('marca_telefono');
            $table->string('referencia_telefono');
            $table->string('tipo_so');
            $table->string('version_so');
            $table->string('serial_telefono');
            $table->integer('imei_1');
            $table->integer('imei_2');
            $table->string('mac_telefono');
            $table->string('incluido');
            $table->string('proveedor');
            $table->integer('precio');
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
        Schema::dropIfExists('telefonos');
    }
}
