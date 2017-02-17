<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Crear Usuario</title>

		<script type="text/javascript" src="{!! 'https://code.jquery.com/jquery-3.1.1.min.js' !!}"></script>
		<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.js' !!}"></script>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css' !!}">

		<!-- Compiled and minified JavaScript -->
		<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js' !!}"></script>
		<link href="{!!'https://fonts.googleapis.com/icon?family=Material+Icons' !!}" rel="stylesheet">
		{!! Html::script('js/scripts.js') !!}
		<link rel="stylesheet" href="{!! 'styles/style.css' !!}">

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
		<h1>Crear Usuario</h1>
		@if(Session::has('mensaje_error'))
				{!! Session::get('mensaje_error') !!}
		@endif
		<div class="row">
			<form class="col s6" action="crear" method="POST">
				<div class="row">
					<div class="input-field col s6">
          	<input id="name" type="text" class="validate" name="name">
          	<label for="name">Name</label>
        	</div>
					<div class="input-field col s6">
						<input type="text" name="username" id="username">
						<label for="username">UserName</label>
					</div>
					<div class="input-field col s6">
						<input type="email" name="email" id="email">
						<label for="email">Correo</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password" id="password">
						<label for="password">Password</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password_repeat" id="password_repeat">
						<label for="password_repeat">Repeat password</label>
					</div>
				</div>
				<input class="btn" onclick="entro()" type="submit" name="submit" id="Submit">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			</form>
		</div>
	</body>
</html>
