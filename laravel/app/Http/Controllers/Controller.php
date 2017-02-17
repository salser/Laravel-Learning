<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Input;
use Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
		public function showLogin()
    {
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('login');
    }

		/**
		* Valida Datos de Usuario
		*/
		public function postLogin()
		{
			//Primero se guardan los datos de usuario dentro de un arreglo
			$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);
			/**
			*Sevalida los datos de usuario y ademas enviamos como segundo
			*parametro la opcion de recordar los datos del usuario
			*/
			if(Auth::attempt($userdata, Input::get('remember-me',0)))
			{
				//Si es valido lo direcciona a un lugar de bienvenida
				return Redirect::to('/');
			}
			/**
			*En caso de fallar regresa al login con msj de Error
			*/
			return Redirect::to('login')
									 ->with('mensaje_error', 'Tus datos son incorrectos')
									 ->withInput();
		}

		/**
     * Muestra el formulario de login mostrando un mensaje de que cerró sesión.
     */
    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }

}
