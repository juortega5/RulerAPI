<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos_personas;
use App\Notas;
use App\Materias_personas;
use App\Materias;
use App\Prm_cursos;
use App\Trabajos;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objCursos = new Cursos_personas();
        $objMaterias = new Materias_personas();
        $materias = $objMaterias->consultarMaterias(session('id'));
        $cursos = $objCursos->consultarCursos(session('id'));
        return view('notas.table',compact('cursos','materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $objCursos = new Prm_cursos();
        $idCurso = $objCursos->buscarId($request->input('curso'));
        $objMaterias = new Materias();
        $idMateria = $objMaterias->buscarId($request->input('materia'));
        $materia = $idMateria->id;
        $objTrabajos = new Trabajos();
        $idTrabajos = $objTrabajos->buscarIdTrabajos($idCurso->id,$idMateria->id);
        $objEstudiantes = new Cursos_personas();
        $estudiantes = $objEstudiantes->consultarAlumnos($idCurso->id,$idMateria->id);
        $notas = new Notas();
       return view('notas.subTable',compact('estudiantes','materia','notas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('estudiantes.index',compact('id'));
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
        if (session('user')==2)
        {
            if ($request->hasfile('file')) {
            $documento = $request->file('file');
            $nombrePdf = $documento->getClientOriginalName();
            $documento->move(public_path().'/tareas/',$nombrePdf);
            }
           $notas = Notas::where('id_trabajo',$id)->
                           where('id_persona',session('id'))->
                           update(['archivoE'=>$nombrePdf,'comentario'=>$request->input('comentario')]);
            return redirect('api/estudiantes/');
        }
        else
        {
            $notas = Notas::where('id_trabajo',$id)->update(array('nota'=>$request->input('valor')));
            return back()->withInput();
        } 
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
