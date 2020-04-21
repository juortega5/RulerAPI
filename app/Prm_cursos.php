<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prm_cursos extends Model
{
    public function cursosPersonas()
	{
		return $this->hasMany('App\Cursos_personas');
	}

	public function buscarId($nombre)
	{
		$id = prm_cursos::select('id')->where('curso',$nombre)->first();
		return $id;
	}
}
