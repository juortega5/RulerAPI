<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajos extends Model
{
    public static function buscarTrabajos($id)
    {
    	$trabajos = Trabajos::select('archivo','descripcion')
                            ->where('id_curso','=',$id,'AND')
                            ->where('id_persona','=',session('id'))->get();
        return $trabajos;
    }
}
