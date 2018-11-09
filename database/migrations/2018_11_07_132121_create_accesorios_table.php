<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesorios', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->date('fecha_entrega');
            $table->date('fecha_mantenimiento');
            $table->string('estado_mantenimiento');
            $table->string('propiedad');
            $table->string('tipo_de_accesorio');
            $table->string('marca_accesorio');
            $table->string('referencia_accesorio');
            $table->string('serial_accesorio');
            $table->string('fccid_accesorio');
            $table->string('icid_accesorio');
            $table->string('incluido');
            $table->string('proveedor');
            $table->integer('precio');
            //php artisan migrate --path=app/database/migrations/2018_11_07_132121_create_accesorios_table.php

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
        Schema::dropIfExists('accesorios');
    }
}
