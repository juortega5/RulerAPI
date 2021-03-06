@extends('personas.index')

@section('respuestas')
<table class="table table-dark table-hover table-bordered table-sm">
	<thead>
		<tr align="center">
			<th colspan="4">Listado de Trabajos 
				<a  href="/api/trabajos" type="button" class="btn btn-success btn-sm">
				  Volver
				</a>
			</th>
		</tr>
	    <tr align="center">
	      <th scope="col">Materia</th>
	      <th scope="col">Descripcion</th>
	      <th scope="col">Link</th>
	      <th scope="col">Video actividad</th>
	    </tr>
	</thead>
	<tbody>
		@foreach($trabajos as $trabajos)
		<tr align="center">
			<th scope="col">{{ $trabajos->nombre }}</th>
			<th scope="col">{{ $trabajos->descripcion }}</th>
			<th scope="col"><a target="blank" href="{{ '/documentos/'.$trabajos->archivo }}">{{ $trabajos->archivo }}</a></th>
			<th scope="col" class="embed-responsive embed-responsive-16by9">
				<video controls src="/documentos/{{ $trabajos->video }}" type="video/ogg"></video>
			</th>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection