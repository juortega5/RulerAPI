<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prm_tipo_Usuario;

class Personas extends Model
{
    
	public function tiposUsuario()
    {
    	return $this->belongsTo('App\Prm_tipo_Usuario','id');
    }

    public function cursosPersonas()
	{
		return $this->hasMany('App\Cursos_personas');
	}

	public function materiasPersonas()
	{
		return $this->hasMany('App\Materias_personas');
	}
}
