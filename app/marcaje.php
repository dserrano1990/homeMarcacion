<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marcaje extends Model
{
    //
    protected $fillable = ['id_empleado','hora_entrada','hora_salida','fecha','localizacion'];

    public function empleados()
    {
        return $this->belongsTo('App\Empleado', 'id_empleado');
    }

}
