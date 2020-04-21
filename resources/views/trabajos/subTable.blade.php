@extends('personas.index')

@section('respuestas')
<table class="table table-dark table-hover table-bordered table-sm">
	<thead>
		<tr align="center">
			<th colspan="2">Listado de Productos 
				<a  href="/api/trabajos" type="button" class="btn btn-success btn-sm">
				  Volver
				</a>
			</th>
		</tr>
	    <tr align="center">
	      <th scope="col">Descripcion</th>
	      <th scope="col">Link</th>
	    </tr>
	</thead>
	<tbody>
		@foreach($trabajos as $trabajos)
		<tr align="center">
			<th scope="col">{{ $trabajos->descripcion }}</th>
			<th scope="col"><a target="blank" href="{{ '/documentos/'.$trabajos->archivo }}">{{ $trabajos->archivo }}</a></th>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection