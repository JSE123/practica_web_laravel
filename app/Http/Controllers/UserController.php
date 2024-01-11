<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AgregarUsuario(Request $request){
        //validar datos
        $request->validate([
            'first_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        $nuevoUsuario = new User();
        $nuevoUsuario->name = $request->input('first_name');
        $nuevoUsuario->email = $request->input('email'); 
        $nuevoUsuario->password = bcrypt($request->input('password'));

        //guardar usuario en la base de datos
        $nuevoUsuario->save();

        return response()->json(['message' => 'Usuario creado con exito']);
    }

    public function ListarUsuarios(){

        $usuarios = User::all();

        return response()->json($usuarios);
    }
    public function EliminarUsuario($id){

        $usuario = User::find($id);

        if(!$usuario){
            return response()->json(['Error' => 'El registro no existe']);

        }

        $usuario->delete();

        return response()->json(['Mensaje' => 'Registro eliminado correctamente']);
    }

    public function ActualizarUsuario(Request $request, $id){
        $usuario = User::find($id); 

        if(!$usuario){
            return response()->json(['Error' => 'Usuario no encontrado']);

        }

        $usuario->fill($request->all());
        // $usuario->name = $request->input('name');
        $usuario->save();

        return response()->json(['message' => 'Usuario actualizado con exito']);
    }
}
