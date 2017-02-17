<!DOCTYPE html>
<html>
    <head>
			<script type="text/javascript" src="{!! 'https://code.jquery.com/jquery-3.1.1.min.js' !!}"></script>
			<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.js' !!}"></script>
			<!-- Compiled and minified CSS -->
			<link rel="stylesheet" href="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css' !!}">

			<!-- Compiled and minified JavaScript -->
			<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js' !!}"></script>
			<link href="{!!'https://fonts.googleapis.com/icon?family=Material+Icons' !!}" rel="stylesheet">
			{!! Html::script('js/scripts.js') !!}
			<link rel="stylesheet" href="{!! 'styles/style.css' !!}">
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
			<nav class="">
	    <div class="nav-wrapper colorNav">
	      <a href="#!" class="brand-logo">Logo</a>
	      <ul class="right hide-on-med-and-down">
	        <li><a href="sass.html"><i class="material-icons left">search</i>Link with Left Icon</a></li>
	        <li><a href="badges.html"><i class="material-icons right">view_module</i>Link with Right Icon</a></li>
	      </ul>
	    </div>
	  </nav>
        {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        @if(Session::has('mensaje_error'))
            {!! Session::get('mensaje_error') !!}
        @endif
				<br>
				<div class="row">
					<form class="col s6 offset-s3" action="login" method="POST">
						<div class="row">
							<div class="input-field col s12">
		          	{!! Form::text('username', Input::old('username')) !!}
		          	<label for="username">Username</label>
		        	</div>
							<div class="input-field col s12">
								<input type="password" name="password" id="password">
								<label for="password">Password</label>
							</div>
						</div>
						<input class="btn" onclick="" type="submit" name="submit" id="Submit">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					</form>
				</div>
        <!-- {!! Form::open(array('url' => '/login')) !!}
            {!! Form::label('usuario', 'Nombre de usuario') !!}
            {!! Form::text('username', Input::old('username')) !!}
            {!! Form::label('contraseña', 'Contraseña') !!}
            {!! Form::password('password') !!}
            {!! Form::label('lblRememberme', 'Recordar contraseña') !!}
            {!! Form::checkbox('rememberme', true) !!}
            {!! Form::submit('Enviar') !!}
        {!! Form::close() !!} -->
				<div class="row">
					<div class="col s6 offset-s3">
						<div class="col s12">
								<a href="crearU">Crear Usuario</a>
						</div>
					</div>
				</div>


    </body>
</html>
