<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function listar_clientes(Request $request){
        $clientes = clientes::where('nombre', 'like' , $request->palabra)->get();

        return $clientes;
    }

    public function guardar_clientes(Request $request){
        
        if($request->id == 0){
            $clientes = new clientes();
        }else{
            $clientes = clientes::find($request->id);
        }
        
        $clientes->nombre = $request->nombre;
        $clientes->appat = $request->appat;
        $clientes->apmat = $request->apmat;
        $clientes->direccion = $request->direccion;
        $clientes->correo = $request->correo;

        $clientes->save();

        return response()->json($clientes);
    }

    public function borra_clientes(Request $request){

        $clientes = clientes::find($request->id);

        $clientes->delete();

        return response()->json(['code'=>'OK'],200);
    }
}
