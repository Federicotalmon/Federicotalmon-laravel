<?php

namespace App\Http\Controllers;

use App\Models\Obra_social;

class ObraSocialController extends Controller
{

    public static function getObraByCuit($cuit)
    {
        return Obra_social::findOrFail($cuit);
    }
    public static function getObra($obras_query)
    {
        return Obra_social::where('nombre', '=', $obras_query)->get()->first();
    }
    public static function getNombresObras()
    {
        return Obra_social::distinct()->get(['nombre']);
    }

    public static function getObras()
    {
        $obras_sociales = Obra_social::get(['cuit', 'nombre']);
        return view('obras_sociales.obrasView', ['obras' => $obras_sociales]);
    }
}


   

    