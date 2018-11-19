<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('usuario_soporte')->unsigned();
            $table->integer('equipo_id')->unsigned();
            $table->integer('accesorio_id')->unsigned();
            $table->integer('telefono_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('accesorio_id')->references('id')->on('accesorios');
            $table->foreign('telefono_id')->references('id')->on('telefonos');
            $table->String('tipo_reporte');
            $table->string('descripcion_usuario');
            $table->date('fecha_reporte');
            $table->string('atendido');
            $table->string('descripcion_soporte')->nullable();
            $table->date('fecha_soporte')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
