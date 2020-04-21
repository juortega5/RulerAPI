<div class="jumbotron jumbotron-fluid" style="background-color:#cae8d5">
  <div class="container">
    <h1 class="display-3">Ruler Api</h1>
    <p class="lead">Plataforma para la presentación de actividades escolares, dirigida a los estudiantes y docentes de instituciones educativas públicas.</p>
  </div>
</div>
<div class="row">
	<div class=" col-md-8">
		<div class="card text-white" style="background-color:#204051">
			<div class="card-body">
				<h5 class="card-title">#QuedateEnCasa</h5>
				<p class="card-text">
					Continua tus estudios, Ruler Api permite a tus docentes subir tareas para que desarrolles en casa.
					Tan pronto desarrolles estas actividades súbelas a la plataforma para que tus profesores puedan calificarlas.
				</p>
				<p class="card-text">
					Recuerda seguir iniciativas de educación como las que encontraras en los siguientes enlaces.
				</p>
				<a href="#" class="card-link">#ProfeEnCasa</a>
			</div>
		</div>
	</div>
	<div class=" col-md-4">
		<div class="card text-white" style="background-color:#204051" >
			<div class="card-body">
				<form method="post" action="/api/personas" autocomplete="off">
					@csrf
					<div class="form-group">
						<label for="usuario">Usuario</label>
						<input type="text" name="nombre" class="form-control" id="usuario" aria-describedby="usuarioHelp" placeholder="Usuario">
						<small id="usuarioHelp" class="form-text text-muted">Ingrese el nombre del usuario.</small>
					</div>
					<div class="form-group">
						<label for="clave">Contraseña</label>
						<input type="password" name="password" class="form-control" id="clave" aria-describedby="claveHelp" placeholder="Contraseña">
						<small id="claveHelp" class="form-text text-muted">Ingrese la contraseña.</small>
					</div>
						<div class="form-group" align="center">
						<button type="submit" class="btn btn-success">Iniciar</button> 
					</div>
				</form>
			</div>
		</div>
	</div>
</div>