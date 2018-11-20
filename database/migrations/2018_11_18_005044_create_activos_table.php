<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->date('fecha_entrega');
            $table->date('fecha_mantenimiento');
            $table->string('estado_mantenimiento');
            $table->string('propiedad');
            $table->string('tipo_de_equipo');
            $table->string('marca_equipo');
            $table->string('referencia_equipo');
            $table->string('serial_equipo');
            $table->string('mtm_equipo')->nullable();
            $table->string('tipo_so')->nullable();
            $table->string('licencia')->nullable();
            $table->string('vso_equipo')->nullable();
            $table->string('nid_sistema_operativo')->nullable();
            $table->string('fccid_equipo')->nullable();
            $table->string('icid_equipo')->nullable();
            $table->string('incluido')->nullable();
            $table->string('tipo_office')->nullable();
            $table->string('nombre_equipo')->nullable();
            $table->string('workgroup_equipo')->nullable();
            $table->string('cuenta_admin_equipo')->nullable();
            $table->string('lan_mac')->nullable();
            $table->string('wifi_mac')->nullable();
            $table->integer('imei_1')->nullable();
            $table->integer('imei_2')->nullable();
            $table->string('pass_admin')->nullable();
            $table->string('proveedor');
            $table->integer('precio');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('activos');
    }
}
