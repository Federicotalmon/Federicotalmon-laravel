<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\medico;


class MedicoController extends Controller
{

    public function cargarMedicos()
    {
        $medicos = $this->getMedicosObrasSociales();
        $listaEspecialidades = $this->especialidades();
        $listaObras = ObraSocialController::getNombresObras();
        return view('medicos.medicosView', ['medicos' => $medicos, 'nombres_obras' => $listaObras, 'especialidades' => $listaEspecialidades]);
    }



    public function cargarMedicosObrasEspecialidades(Request $request)
    {
        $obras_query = $request->input('drop-obras');
        $especialidades_query = $request->input('drop-especialidades');
        $listaEspecialidades = $this->especialidades();
        $listaObras = ObraSocialController::getNombresObras();
        $obra = ObraSocialController::getObra($obras_query);

        $medicos = medico::join('medicos_obras_sociales', 'medicos.matricula', '=', 'medicos_obras_sociales.matricula')
            ->join('obras_sociales', 'medicos_obras_sociales.cuit', '=', 'obras_sociales.cuit')
            ->get(['medicos.nombre as nombre_medico', 'medicos.matricula', 'medicos.especialidad', 'obras_sociales.nombre as nombre_obra']);

        if ($especialidades_query != 'Especialidad' && $especialidades_query != 'Todas')
            $medicos = $medicos->where('especialidad', '=', $especialidades_query);

        if ($obras_query != 'Obra social' && $obras_query != 'Todas')
            $medicos = $medicos->where('nombre_obra', '=', $obras_query);


        return view('medicos.medicosView', ['medicos' => $medicos, 'nombres_obras' => $listaObras, 'especialidades' => $listaEspecialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function getMedicosObrasSociales()
    {
        return Medico::join('medicos_obras_sociales', 'medicos.matricula', '=', 'medicos_obras_sociales.matricula')
            ->join('obras_sociales', 'medicos_obras_sociales.cuit', '=', 'obras_sociales.cuit')
            ->get(['medicos.nombre as nombre_medico', 'medicos.matricula', 'medicos.especialidad', 'obras_sociales.nombre as nombre_obra']);
    }          
      
    public static function especialidades()
    {
        return Medico::distinct()->get(['especialidad']);
    }

    public static function todos()
    {
        return Medico::get(['nombre', 'especialidad', 'matricula']);
    }


    public static function getMedico($matricula)
    {
        return Medico::find($matricula);
    }

    public static function getNombreMedico($matricula)
    {
        $medico = Medico::find($matricula)->nombre;
        return $medico;
    }


}
