<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class consumirAPIController extends Controller
{
    public function registrarUsuario(Request $request){
        // datos a enviar
        $datos = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        

        try {
           
            
            $response = Http::post('http://127.0.0.1:8000/api/crearUsuario', $datos);
            if ($response->successful()) {
                // La solicitud fue exitosa (código de estado entre 200 y 299)
                return $response->json();
            } else {
                // Manejar la respuesta en caso de error
                return $response->status();
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function mostrarUsuarios(){

        try {
            
            $response = Http::get('http://127.0.0.1:8000/api/listarUsuarios');
            // $response = $client->request('GET', 'http://127.0.0.1:8000/api/listarUsuarios');
            if($response->successful()){

                $usuarios = $response;
                return $usuarios;
                // return view('verUsuarios', compact('usuarios'));
            }else{
                return 'Ocurrio un error al obtener los datos de la API';
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
