<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->date('fecha_entrega');
            $table->date('fecha_mantenimiento');
            $table->string('estado_mantenimiento');
            $table->string('propiedad');
            $table->string('tipo_de_equipo');
            $table->string('marca_equipo');
            $table->string('referencia_equipo');
            $table->string('serial_equipo');
            $table->string('mtm_equipo')->nullable();
            $table->string('tipo_so');
            $table->string('licencia');
            $table->string('vso_equipo');
            $table->string('nid_sistema_operativo')->nullable();
            $table->string('tipo_office');
            $table->string('nombre_equipo');
            $table->string('workgroup_equipo')->nullable();
            $table->string('cuenta_admin_equipo');
            $table->string('lan_mac')->nullable();
            $table->string('wifi_mac');
            $table->string('pass_admin')->nullable();
            $table->string('proveedor');
            $table->integer('precio');
            $table->timestamps('deleted_at')->nullable();

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
        Schema::dropIfExists('equipos');
    }
}
