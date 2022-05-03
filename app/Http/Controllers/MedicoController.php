<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Medico;
use App\Models\Obra_social;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cargarMedicos()
    {
         $medicos = Medico::getMedicosObrasSociales();
         $listaEspecialidades = Medico::especialidades();
         $listaObras = ObraSocialController::getNombresObras();
         return view('medicos.medicosView', ['medicos' => $medicos,'nombres_obras' => $listaObras,'especialidades' =>$listaEspecialidades]);
   
    }

    
    public function cargarMedicosObrasEspecialidades(Request $request){ 
        
        $obras_query = $request->input('drop-obras');
        $especialidades_query = $request->input('drop-especialidades');
        $listaEspecialidades = Medico::especialidades();
        $listaObras = Obra_social::getNombresObras();
        $obra = Obra_social::where('nombre','=',$obras_query)->get()->first();
        
        
        if(($obras_query=='Obra social' || $obras_query=='Todas') && ($especialidades_query=='Especialidad' || $especialidades_query=='Todas')){
    
            $medicos = $medicos = DB::table('medicos')
            ->join('medicos_obras_sociales','medicos.matricula','=','medicos_obras_sociales.matricula')
            ->join('obras_sociales','medicos_obras_sociales.cuit','=','obras_sociales.cuit')
            ->select('medicos.nombre as nombre_medico','medicos.matricula','medicos.especialidad','obras_sociales.nombre as nombre_obra',)
            ->get() ;
        }
        
        if(!($obras_query=='Obra social' || $obras_query=='Todas') && ($especialidades_query=='Especialidad' || $especialidades_query=='Todas')){
            
            $medicos = $medicos = DB::table('medicos')
            ->join('medicos_obras_sociales','medicos.matricula','=','medicos_obras_sociales.matricula')
            ->join('obras_sociales','medicos_obras_sociales.cuit','=','obras_sociales.cuit')
            ->select('medicos.nombre as nombre_medico','medicos.matricula','medicos.especialidad','obras_sociales.nombre as nombre_obra',)
            ->where('obras_sociales.cuit','=',$obra->cuit)->get() ;
        }
    
        if(($obras_query=='Obra social' || $obras_query=='Todas') && !($especialidades_query=='Especialidad' || $especialidades_query=='Todas')){
            
            $medicos = $medicos = DB::table('medicos')
            ->join('medicos_obras_sociales','medicos.matricula','=','medicos_obras_sociales.matricula')
            ->join('obras_sociales','medicos_obras_sociales.cuit','=','obras_sociales.cuit')
            ->where('medicos.especialidad','=',$especialidades_query)
            ->select('medicos.nombre as nombre_medico','medicos.matricula','medicos.especialidad','obras_sociales.nombre as nombre_obra',)
            ->get() ;
        }
    

        if(!($obras_query=='Obra social' || $obras_query=='Todas') && !($especialidades_query=='Especialidad' || $especialidades_query=='Todas')){
            
            $medicos = $medicos = DB::table('medicos')
            ->join('medicos_obras_sociales','medicos.matricula','=','medicos_obras_sociales.matricula')
            ->join('obras_sociales','medicos_obras_sociales.cuit','=','obras_sociales.cuit')
            ->where('medicos.especialidad','=',$especialidades_query)
            ->select('medicos.nombre as nombre_medico','medicos.matricula','medicos.especialidad','obras_sociales.nombre as nombre_obra',)
            ->where('obras_sociales.cuit','=',$obra->cuit)->get() ;
        }

        return view('medicos.medicosView', ['medicos' => $medicos,'nombres_obras' => $listaObras,'especialidades' =>$listaEspecialidades]);
    
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
        //
    }
    


}
