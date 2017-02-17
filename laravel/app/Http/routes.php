<?php

// Nos mostrará el formulario de login.
Route::get('login', 'Controller@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'Controller@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('/', function()
    {
        return View::make('hello');
    });
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'Controller@logOut');
});

Route::get('crearU', function()
{
	return view('ingresar');
});

Route::get('index', 'test@index');
Route::post('crear', 'test@crear');
