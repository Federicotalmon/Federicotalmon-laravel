<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Turno;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTurnosPacientes()
    {
        $turnos_pacientes = $this->turnos();
        if ($turnos_pacientes->isEmpty())
            return view('pacientes.turnosPaciente', ['turnos' => null]);
        else
            return view('pacientes.turnosPaciente', ['turnos' => $turnos_pacientes]);
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
    public function getTurnosPaciente(Request $request)
    {
        $dni = $request->input('dni');
        $turnos_paciente = $this->turnosPaciente( $dni);
        if ($turnos_paciente->isEmpty())
            return view('pacientes.turnosPaciente', ['turnos' => null]);
        else
            return view('pacientes.turnosPaciente', ['turnos' => $turnos_paciente]);
    }

    public static function turnosPaciente($dni){
        return Paciente::join('turnos','dni_paciente','=','dni')
        ->join('estados','id_estado','=','estados.id')
        ->join('medicos','medicos.matricula','=','turnos.matricula_medico')
        ->where('dni',$dni)
        ->whereColumn('estados.id','turnos.id_estado')
        ->get(['medicos.nombre','turnos.fecha','dni','estados.estado','turnos.matricula_medico','turnos.detalles','turnos.id']);

    }

    
    public static function turnos(){
        return Paciente::join('turnos','dni_paciente','=','dni')
        ->join('estados','id_estado','=','estados.id')
        ->join('medicos','medicos.matricula','=','turnos.matricula_medico')
        ->whereColumn('estados.id','turnos.id_estado')
        ->get(['medicos.nombre','turnos.fecha','dni','estados.estado','turnos.matricula_medico','turnos.detalles','turnos.id']);

    }

    public function getDetallesTurno($id){
        $turno = Turno::find($id);
        $estado = EstadoController::getNombreEstado($turno->id_estado);
        $medico = MedicoController::getNombreMedico($turno->matricula_medico);
        return view ('pacientes.detallesTurnoDePaciente', ['turno' => $turno,'medico' => $medico,'estado' => $estado]);
    }
 
}
