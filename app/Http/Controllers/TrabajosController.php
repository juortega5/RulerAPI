<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajos;
use App\Cursos_personas;
use App\Materias_personas;
use App\Materias;
use App\Prm_cursos;
use App\Notas;

class TrabajosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objCursos = new Cursos_personas();
        $cursos = $objCursos->consultarCursos(session('id'));
        return view('trabajos.table',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objCursos = new Cursos_personas();
        $objMaterias = new Materias_personas();
        $materias = $objMaterias->consultarMaterias(session('id'));
        $cursos = $objCursos->consultarCursos(session('id'));
        return view('trabajos.index',compact('cursos','materias'));       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if ($request->hasfile('file')) {
            $documento = $request->file('file');
            $nombrePdf = $documento->getClientOriginalName();
            $documento->move(public_path().'/documentos/',$nombrePdf);
        }
        if ($request->hasfile('video')) {
            $video = $request->file('video');
            $nombreVideo = $video->getClientOriginalName();
            $video->move(public_path().'/documentos/',$nombreVideo);
        }
        $objCursos = new Prm_cursos();
        $idCurso = $objCursos->buscarId($request->input('curso'));
        $objMaterias = new Materias();
        $idMateria = $objMaterias->buscarId($request->input('materia'));
        $trabajo = new Trabajos();
        $trabajo->id_persona = session('id');
        $trabajo->archivo = $nombrePdf;
        $trabajo->video = $nombreVideo;
        $trabajo->descripcion = $request->input('descripcion');
        $trabajo->id_curso = $idCurso->id;
        $trabajo->id_materia = $idMateria->id;
        $trabajo->save();
        $estado = "Se ha creado la actividad correctamente";
        $ultimoId = Trabajos::all()->last()->id;      
        $objCursosPersonas = new Cursos_personas();
        $alumnos = $objCursosPersonas->consultarAlumnos($idCurso->id,$idMateria->id);
        for ($i=0; $i <count($alumnos) ; $i++) 
        { 
            $notas = new Notas();
            $notas->id_persona = $alumnos[$i]->id;
            $notas->id_trabajo = $ultimoId;
            $notas->nota = "0";
            $notas->archivoE = "No aplica" ;
            $notas->comentario =  "No aplica";
            $notas->save();
        }
        return view('commons.success',compact('estado'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      //return Trabajos::where('id', $id)->get();  
        $objCursos = new Prm_cursos();
        $idCurso = $objCursos->buscarId($request->curso);
        $trabajos = Trabajos::buscarTrabajos($idCurso->id);
        return view('trabajos.subTable',compact('trabajos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
