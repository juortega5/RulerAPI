<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    public static function consultarNotas($id,$materia)
    {
    	$notas = Notas::join('trabajos','notas.id_trabajo','trabajos.id')->
    					where('notas.id_persona',$id,'AND')->
    					where('trabajos.id_materia',$materia)->
    					get();
    	return $notas;
    }
}
