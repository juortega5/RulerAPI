@extends('personas.index')

@section('respuestas')
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="card text-white" style="background-color:#204051" >
			<div class="card-body">
				<form class="form-group" autocomplete="off" action="/api/trabajos" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="unidad">Curso</label>
						<select name="curso"  class="form-control" id="curso" aria-describedby="cursoHelp">
							<option value="selected">Seleccione un curso</option>
							@foreach($cursos as $cursos)
							<option value="{{ $cursos }}">{{ $cursos }}</option>
							@endforeach
						</select>
						<small id="cursoHelp" class="form-text text-muted">Seleccione el curso al cual desea cargar una actividad.</small>
					</div>
					<div class="form-group">
						<label for="archivo">Archivo</label>
						<input name="file" type="file" class="form-control" id="archivo" aria-describedby="precioHelp" placeholder="Precio">
						<small id="precioHelp" class="form-text text-muted">Seleccione el archivo a cargar.</small>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<textarea name="descripcion" class="form-control" id="precio" aria-describedby="precioHelp" placeholder="Descripcion"></textarea>
						<small id="precioHelp" class="form-text text-muted">Descripción de las actividades a desarrollar.</small>
					</div>
					<div class="form-group" align="center">
						<button type="submit" class="btn btn-primary">Guardar</button> 
					</div>
			    </form>
			</div>
		</div>
	</div>
</div>
@endsection