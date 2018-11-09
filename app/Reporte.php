<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    
    public function equipo(){
    	return $this->hasMany(Equipo::class );
    }

    public function user(){
    	return $this->hasMany(User::class, 'usuario_id');
    }
}
