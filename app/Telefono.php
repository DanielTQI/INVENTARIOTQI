<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = ['usuario_id','fecha_entrega','fecha_mantenimiento','estado_mantenimiento','propiedad','tipo_de_telefono','marca_telefono','referencia_telefono','tipo_so','version_so','serial_telefono','imei_1','imei_2','mac_telefono','incluido','proveedor','precio'];

    public function usuarios(){
    	return $this->belongsTo(User::class, 'usuario_id' );
    }


}
