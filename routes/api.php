<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');//para iniciar sesion
Route::post('/registrarse', [AuthController::class, 'register'])->name('registrarse');//para que el usuario se registre
Route::post('/crearUsuario', [UserController::class, 'AgregarUsuario'])->name('registrar.usuario'); // para registrar un usuario
Route::get('/listarUsuarios', [UserController::class, 'ListarUsuarios'])->name('listar.usuario');
Route::delete('/eliminarUsuario/{id}', [UserController::class, 'EliminarUsuario'])->name('eliminar.usuario');
Route::put('/actualizarUsuario/{id}', [UserController::class, 'ActualizarUsuario'])->name('actualizar.usuario');


