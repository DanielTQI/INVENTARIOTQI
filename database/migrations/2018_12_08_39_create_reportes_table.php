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
            $table->integer('activo_id')->unsigned();
            $table->integer('usuario_soporte')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('activo_id')->references('id')->on('activos');
            $table->String('tipo_reporte');
            $table->string('descripcion_usuario');
            $table->date('fecha_reporte');
            $table->string('atendido');
            $table->string('descripcion_soporte')->nullable();
            $table->date('fecha_soporte')->nullable();
            $table->timestamps();
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
