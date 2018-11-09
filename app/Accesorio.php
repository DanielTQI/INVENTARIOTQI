<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    protected $fillable = ['usuario_id','fecha_entrega','fecha_mantenimiento','estado_mantenimiento','propiedad','tipo_de_accesorio','marca_accesorio','referencia_accesorio','serial_accesorio','fccid_accesorio','icid_accesorio','incluido','proveedor','precio'];

    public function user(){
    	return $this->belongsTo(User::class, 'usuario_id' );
    }
}
