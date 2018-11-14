<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    protected $fillable = [' usuario_id', 'fecha_entrega', 'fecha_mantenimiento', 'estado_mantenimiento','propiedad','tipo_de_equipo','marca_equipo','referencia_equipo','serial_equipo','mtm_equipo','tipo_so','licencia','vso_equipo','nid_sistema_operativo','tipo_office','nombre_equipo','workgroup_equipo','cuenta_admin_equipo','lan_mac','wifi_mac','pass_admin','proveedor','precio'];

     public function user(){
    	return $this->belongsTo(User::class, 'usuario_id' );
    }
}


