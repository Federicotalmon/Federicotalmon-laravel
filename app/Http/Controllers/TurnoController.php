<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Turno;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\NuevoTurnoRequest;
use App\Http\Requests\EditarTurnoRequest;
use Carbon\Carbon;
use App\Http\Controllers\EstadoController;

class TurnoController extends Controller
{

    public function getTurnosMedico($matricula)
    {
        $turnos_sin_separar = Turno::where('matricula_medico', $matricula)->orderBy('fecha')->get();
        return $this->poblarTurnosMedico($turnos_sin_separar, $matricula);
    }

    public function getTurnosMedicoFecha(Request $request, $matricula)
    {
        $fecha = $request->input('input');
        $desde = Carbon::createFromFormat('d-m-Y', $fecha)->startOfDay();
        $hasta = Carbon::createFromFormat('d-m-Y', $fecha)->endOfDay();
        $turnos_sin_separar = Turno::where('matricula_medico', $matricula)->orderBy('fecha')
            ->whereBetween('fecha', [$desde, $hasta])
            ->get();
        return $this->poblarTurnosMedico($turnos_sin_separar, $matricula);
    }

    public function nuevoTurno($matricula)
    {

        $estados = EstadoController::getEstados();
        $medico = MedicoController::getMedico($matricula);
        return view('turnos.turnoNuevo', ['estados' => $estados, 'medico' => $medico]);
    }

    public function editarTurno($matricula, $id)
    {
        $estados = EstadoController::getEstados();
        $medico = MedicoController::getMedico($matricula);
        $turno = Turno::find($id);
        $fecha = date('Y-m-d\TH:i', strtotime($turno->fecha));
        $estado_actual = EstadoController::getNombreEstado($turno->id_estado);
        return view('turnos.turnoEditar', ['estado_actual' => $estado_actual, 'estados' => $estados, 'medico' => $medico, 'turno' => $turno, 'fecha' => $fecha]);
    }


    public static function poblarTurnosMedico($turnos_sin_separar, $matricula)
    {
        $nombre = MedicoController::getNombreMedico($matricula);
        $estados = EstadoController::getEstados();
        $turnos = new Collection();

        foreach ($turnos_sin_separar as $turno_sin_separar) {
            $fecha = date_create($turno_sin_separar->fecha);
            $dia = date_format($fecha, 'd-m-Y');
            $hora = date_format($fecha, 'H:i:s');

            $turno = [$dia, $hora, $turno_sin_separar];
            $turnos->push($turno);
        }

        return view('turnos.turnosDeMedico', ['turnos' => $turnos,'nombre' => $nombre, 'matricula' => $matricula]);
    }

    public function store(NuevoTurnoRequest $request)
    {
        $turno = new Turno();
        $fecha = Carbon::createFromFormat('Y-m-d\TH:i', $request->fecha);
        $fecha = $fecha->format('Y-m-d H:i:s');
        $turno->detalles = $request->detalles;
        $turno->matricula_medico = $request->matricula_medico;
        $estado = EstadoController::getIdEstado($request->estado_turno);
        $turno->id_estado = $estado;
        $turno->fecha = $fecha;
        if (trim($request->dni_paciente) == '')
            $turno->dni_paciente == null;
        else {
            $turno->dni_paciente = $request->dni_paciente;
            $request->validate([
                'dni_paciente' => 'exists:pacientes,dni'
            ]);
        }
        $turno->save();
        return redirect()->back()->with('message', 'Nuevo turno creado correctamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarTurnoRequest $request, $id)
    {
        $turno = Turno::findOrFail($id);
        $fecha = Carbon::createFromFormat('Y-m-d\TH:i', $request->fecha);
        $fecha = $fecha->format('Y-m-d H:i:s');
        $turno->detalles = $request->detalles;
        $turno->matricula_medico = $request->matricula_medico;
        $estado = EstadoController::getIdEstado($request->estado_turno);
        $turno->id_estado = $estado;
        $turno->fecha = $fecha;
        if (trim($request->dni_paciente) == '')
            $turno->dni_paciente == null;
        else {
            $turno->dni_paciente = $request->dni_paciente;
            $request->validate([
                'dni_paciente' => 'exists:pacientes,dni'
            ]);
        }
        $turno->save();
        return redirect()->back()->with('message', 'Turno actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        $matricula = $turno->matricula_medico;
        $turno->delete();
        return redirect()->route('turnos_de_medico',$matricula)->with('message', 'Turno eliminado correctamente');
    }
}
