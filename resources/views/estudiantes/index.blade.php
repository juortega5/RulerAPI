@extends('personas.index')

@section('respuestas')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="card text-white" style="background-color:#204051" >
			<div class="card-body">
				<form class="form-group" autocomplete="off" action="/api/notas/{{$id}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="archivo">Archivo</label>
						<input required name="file" type="file" class="form-control" id="archivo" aria-describedby="archivoHelp" placeholder="Precio">
						<small id="archivoHelp" class="form-text text-muted">Seleccione el archivo a cargar.</small>
					</div>
					<div class="form-group">
						<label for="comentario">Comentario</label>
						<textarea required name="comentario" class="form-control" id="comentario" aria-describedby="comentarioHelp" placeholder="Comentario"></textarea>
						<small id="comentarioHelp" class="form-text text-muted">Comentario extra sobre la actividad desarrollada.</small>
					</div>
					<div class="form-group" align="center">
						<button type="submit" class="btn btn-primary">Guardar</button> 
						<a  href="/api/estudiantes" type="button" class="btn btn-success">
						  Volver
						</a>
					</div>
			    </form>
			</div>
		</div>
	</div>
</div>
@endsection