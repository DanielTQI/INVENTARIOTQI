<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
     protected $fillable = [' usuario_id', 'fecha_entrega', 'fecha_mantenimiento', 'estado_mantenimiento','propiedad','tipo_de_equipo','marca_equipo','referencia_equipo','serial_equipo','mtm_equipo','tipo_so','licencia','vso_equipo','nid_sistema_operativo',  
         'fccid_equipo','icid_equipo','incluido','tipo_office','nombre_equipo','workgroup_equipo','imei_1','imei_2','cuenta_admin_equipo','lan_mac','wifi_mac','pass_admin','proveedor','precio'];
}
