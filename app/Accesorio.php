<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Accesorio extends Model
{
	use SoftDeletes;

	

	protected $dates = ['deleted_at'];



    protected $fillable = ['usuario_id','fecha_entrega','fecha_mantenimiento','estado_mantenimiento','propiedad','tipo_de_accesorio','marca_accesorio','referencia_accesorio','serial_accesorio','fccid_accesorio','icid_accesorio','incluido','proveedor','precio'];



    public function user(){
    	return $this->belongsTo(User::class, 'usuario_id' );
    }
}
