<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    protected $fillable = ['name','apellido','cedula','email','password','sexo','estado_civil','telefono','id_role'];

    
    /*public function marcajes(){
        return $this->hasMany('App\marcaje', 'id_empleado');
    }*/
}
