<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reporte extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
    public function equipo(){
    	return $this->hasMany(Equipo::class );
    }

    public function user(){
    	return $this->hasMany(User::class, 'usuario_id');
    }
}
