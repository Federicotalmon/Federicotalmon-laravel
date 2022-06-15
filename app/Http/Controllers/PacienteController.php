<?php

namespace App\Http\Controllers;


use App\Models\Paciente;
use App\Models\Turno;
use App\Http\Requests\TurnosPacienteRequest;


class PacienteController extends Controller
{


    public function show()
    {
        return view('pacientes.pacientes',['pacientes' => Paciente::all()]);
    }

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


    public function getDetallesTurno($id)
    {
        $turno = Turno::find($id);
        $estado = EstadoController::getNombreEstado($turno->id_estado);
        $medico = MedicoController::getNombreMedico($turno->matricula_medico);
        return view('pacientes.detallesTurnoDePaciente', ['turno' => $turno, 'medico' => $medico, 'estado' => $estado]);
    }
}
