<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reporte extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];
   

    public function user(){
    	return $this->belongsTo(User::class, 'usuario_soporte' );
    }
}
