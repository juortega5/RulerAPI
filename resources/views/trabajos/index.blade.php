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
						<select required="" name="curso"  class="form-control" id="curso" aria-describedby="cursoHelp">
							<option value="">Seleccione un curso</option>
							@foreach($cursos as $cursos)
							<option value="{{ $cursos }}">{{ $cursos }}</option>
							@endforeach
						</select>
						<small id="cursoHelp" class="form-text text-muted">Seleccione el curso al cual desea cargar una actividad.</small>
					</div>
					<div class="form-group">
						<label for="materia">Materia</label>
						<select required name="materia"  class="form-control" id="materia" aria-describedby="materiaHelp">
							<option value="">Seleccione una materia</option>
							@foreach($materias as $materias)
							<option value="{{ $materias }}">{{ $materias }}</option>
							@endforeach
						</select>
						<small id="materiaHelp" class="form-text text-muted">Seleccione la materia a la cual desea cargar una actividad.</small>
					</div>
					<div class="form-group">
						<label for="archivo">Archivo</label>
						<input required name="file" type="file" class="form-control" id="archivo" aria-describedby="archivoHelp" placeholder="Precio">
						<small id="archivoHelp" class="form-text text-muted">Seleccione el archivo a cargar.</small>
					</div>
					<div class="form-group">
						<label for="video">Video</label>
						<input required name="video" type="file" class="form-control" id="video" aria-describedby="videoHelp" placeholder="Video">
						<small id="videoHelp" class="form-text text-muted">Seleccione el video de apoyo a cargar.</small>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<textarea required name="descripcion" class="form-control" id="precio" aria-describedby="videoHelp" placeholder="Descripcion"></textarea>
						<small id="videoHelp" class="form-text text-muted">Descripción de las actividades a desarrollar.</small>
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