<?php

namespace App\Http\Controllers;

use App\Models\Estado;


class EstadoController extends Controller
{
    public static function getEstados()
    {
        return Estado::all();
    }

    public static function getNombreEstado($id){
        $estado = Estado::find($id)->estado;
        return $estado;
    }

    public static function getIdEstado($nombre){
    
        $estado = Estado::where('estado','=',$nombre)->first();
        return $estado->id;
    }
}

