<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prm_cursos;
use App\Personas;

class Cursos_personas extends Model
{
    public function personas()
    {
    	return $this->belongsTo('App\Personas','id');
    }

    public function prmCursos()
    {
    	return $this->belongsTo('App\Prm_cursos','id');
    }

    public  function consultarCursos($id)
	{
		$cursos = prm_cursos::join('cursos_personas','cursos_personas.id_curso','=','prm_cursos.id')
								->select('cursos_personas.id','prm_cursos.curso')
								->where('cursos_personas.id_persona', $id)->get();
        $select = [];
        foreach($cursos as $cursos)
        {
            $select[$cursos->id] = $cursos->curso;
        }
        return $select;
	}

    public  function consultarAlumnos($id)
    {
        $alumnos = personas::join('cursos_personas','cursos_personas.id_persona','=','personas.id')
                                ->select('personas.id')
                                ->where('cursos_personas.id_curso', $id,'AND')
                                ->where('personas.id_tipo_usuario', '2')->get();
        return $alumnos;
    }

}
