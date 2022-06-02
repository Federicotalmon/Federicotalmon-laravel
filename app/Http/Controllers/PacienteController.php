<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Turno;
use Carbon\Carbon;
use App\Http\Requests\TurnosPacienteRequest;
use App\Http\Requests\PacienteStoreRequest;
use App\Http\Requests\PacienteUpdateRequest;

class PacienteController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obras = ObraSocialController::getNombresObras();
        return view ('pacientes.createPaciente',['obras' => $obras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteStoreRequest $request)
    {
        $fecha = Carbon::createFromFormat('Y-m-d', $request->fecha_nacimiento);
        $fecha = $fecha->format('Y-m-d');
        $nombre_obra = $request->input('drop-obras');
        $cuit = ObraSocialController::getObra($nombre_obra)->cuit;
        $paciente = new Paciente();
        $paciente->dni = $request->dni;
        $paciente->telefono = $request->telefono;
        $paciente->email = $request->email;
        $paciente->sexo = $request->sexo;
        $paciente->fecha_nacimiento = $fecha;
        $paciente->obra_social_cuit = $cuit;
        $paciente->sexo = $request->input('drop-sexo');
        $paciente -> save();
        return redirect()->route('pacientes')->with('message', 'Nuevo paciente creado correctamente!');
    }

    public function show()
    {
        return view('pacientes.pacientes',['pacientes' => Paciente::all()]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $paciente = Paciente::findOrFail($dni);
        $obraActual = ObraSocialController::getObraByCuit($paciente->obra_social_cuit);
        $obras = ObraSocialController::getNombresObras();
        return view ('pacientes.editarPaciente',['obraActual'=> $obraActual,'obras' => $obras,'paciente' => $paciente]);
   
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteUpdateRequest $request, $dni)
    {
        $paciente = Paciente::findOrFail($dni);
        $fecha = Carbon::createFromFormat('Y-m-d', $request->fecha_nacimiento);
        $fecha = $fecha->format('Y-m-d');
        $nombre_obra = $request->input('drop-obras');
        $cuit = ObraSocialController::getObra($nombre_obra)->cuit;
        $paciente->dni = $request->dni;
        $paciente->telefono = $request->telefono;
        $paciente->email = $request->email;
        $paciente->sexo = $request->sexo;
        $paciente->fecha_nacimiento = $fecha;
        $paciente->obra_social_cuit = $cuit;
        $paciente->sexo = $request->input('drop-sexo');
        $paciente -> save();
        return redirect()->route('pacientes')->with('message', 'Paciente actualizado correctamente!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        $paciente = Paciente::findOrFail($dni);
        $paciente->delete();
        return redirect()->route('pacientes')->with('message', 'paciente eliminado correctamente!');
    }


    public function getTurnos($dni = null)
    {
        if ($dni == null)
            return ($this->getTurnosPacientes());
        else
            return ($this->getTurnosPaciente($dni));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTurnosPacientes()
    {
        
        $turnos_pacientes = Turno::whereNotNull('dni_paciente')->get();
        if ($turnos_pacientes->isEmpty())
            return view('pacientes.turnosPaciente', ['turnos' => null]);
        else
            return view('pacientes.turnosPaciente', ['turnos' => $turnos_pacientes]);
    }


    public function getTurnosPaciente(TurnosPacienteRequest $request)
    {
        $turnos_paciente = Paciente::find($request->dni)->turnos;
        return view('pacientes.turnosPaciente', ['turnos' => $turnos_paciente]);
    }

    public function getTurnosPacientee(TurnosPacienteRequest $request)
    {
        
        $turnos_paciente = $this->turnosPaciente($request->dni);
        return view('pacientes.turnosPaciente', ['turnos' => $turnos_paciente]);
    }

    public function getDetallesTurno($id)
    {
        $turno = Turno::find($id);
        $estado = EstadoController::getNombreEstado($turno->id_estado);
        $medico = MedicoController::getNombreMedico($turno->matricula_medico);
        return view('pacientes.detallesTurnoDePaciente', ['turno' => $turno, 'medico' => $medico, 'estado' => $estado]);
    }
}
