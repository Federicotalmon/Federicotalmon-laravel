<?php

namespace App\Http\Controllers;

use App\Models\Obra_social;
use App\Http\Requests\ObraStoreRequest;
use App\Http\Requests\ObraUpdateRequest;

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('obras_sociales.obraNueva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObraStoreRequest $request)
    {
        $obra = new Obra_social();
        $obra->cuit = $request->cuit;
        $obra->nombre = $request->nombre;
        $obra->save();
        return redirect()->back()->with('message', 'Nueva obra creada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cuit
     * @return \Illuminate\Http\Response
     */
    public function edit($cuit)
    {
        $obra = Obra_social::findOrFail($cuit);
        return view('obras_sociales.obraEditar', ['obra' => $obra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cuit
     * @return \Illuminate\Http\Response
     */
    public function update(ObraUpdateRequest $request, $cuit)
    {
        $obra = Obra_social::findOrFail($cuit);
        $obra->nombre = $request->nombre;
        $obra->save();
        return redirect()->back()->with('message', 'Obra actualizada correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cuit)
    {
        $obra = Obra_social::findOrFail($cuit);
        $obra->delete();
        return redirect()->back()->with('message', 'La obra fue eliminada correctamente!');
    }
}
