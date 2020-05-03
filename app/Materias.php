<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    public function cursosPersonas()
	{
		return $this->hasMany('App\Cursos_personas');
	}

	public function buscarId($nombre)
	{
		$id = materias::select('id')->where('nombre',$nombre)->first();
		return $id;
	}
}
