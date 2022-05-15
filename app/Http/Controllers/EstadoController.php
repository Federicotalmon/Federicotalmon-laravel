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
}
