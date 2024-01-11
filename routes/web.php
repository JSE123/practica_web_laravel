<?php


use App\Http\Controllers\consumirAPIController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function (){
    return view('login');
});
Route::get('/usuarios', function (){
    return view('verUsuarios');
});

Route::post('/consumir-guardas-datos-usuario', [consumirAPIController::class, 'registrarUsuario'])->name('enviar.datos_usuario');
Route::get('/consumir-mostrar-datos-usuario', [consumirAPIController::class, 'mostrarUsuarios'])->name('mostrar.datos_usuarios');
// Route::get('/usuarios', [consumirAPIController::class, 'mostrarUsuarios'])->name('mostrar.datos_usuarios');

Route::get('/', HomeController::class);
// Route::get('cursos', [CursoController::class, 'index']);
// Route::get('cursos/create', [CursoController::class, 'create']);
// Route::get('cursos/{show}', [CursoController::class, 'show']);

