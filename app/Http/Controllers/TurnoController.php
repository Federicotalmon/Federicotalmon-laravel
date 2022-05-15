<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Turno;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\EstadoController;
use Carbon\Carbon;


class TurnoController extends Controller
{

    public function getTurnosMedico($matricula)
    {
        $turnos_sin_separar = TurnoController::turnosMedico($matricula);
        return $this->poblarTurnosMedico($turnos_sin_separar, $matricula);
    }

    public function getTurnosMedicoFecha(Request $request, $matricula)
    {
        $fecha = $request->input('input');
        $turnos_sin_separar = TurnoController::turnosMedicoFecha($matricula, $fecha);
        return $this->poblarTurnosMedico($turnos_sin_separar, $matricula);
    }



    private static function poblarTurnosMedico($turnos_sin_separar, $matricula)
    {
        $estados = EstadoController::getEstados();
        $medico = MedicoController::getMedico($matricula);
        $turnos = new Collection();

        foreach ($turnos_sin_separar as $turno_sin_separar) {
            $fecha = date_create($turno_sin_separar->fecha);
            $dia = date_format($fecha, 'd-m-Y');
            $hora = date_format($fecha, 'H:i:s');

            $turno = [$turno_sin_separar->nombre, $dia, $hora, $turno_sin_separar->estado, $turno_sin_separar->dni_paciente, $turno_sin_separar->detalles, $matricula];
            $turnos->push($turno);
        }

        return view('turnos.turnosDeMedico', ['turnos' => $turnos, 'nombre' => $medico->nombre, 'estados' => $estados, 'matricula' => $matricula]);
    }

    public static function turnosMedico($matricula)
    {
        return Turno::join('medicos', 'matricula_medico', '=', 'matricula')
            ->join('estados', 'turnos.id_estado', '=', 'estados.id')
            ->where('medicos.matricula', '=', $matricula)
            ->whereColumn('estados.id', 'turnos.id_estado')
            ->orderBy('turnos.fecha')
            ->get(['turnos.fecha', 'estados.estado', 'medicos.nombre', 'medicos.matricula', 'turnos.dni_paciente', 'turnos.detalles']);
    }

    public static function turnosMedicoFecha($matricula, $fecha)
    {
        $desde = Carbon::createFromFormat('d-m-Y', $fecha)->startOfDay();
        $hasta = Carbon::createFromFormat('d-m-Y', $fecha)->endOfDay();

        return Turno::join('medicos', 'matricula_medico', '=', 'matricula')
            ->join('estados', 'turnos.id_estado', '=', 'estados.id')
            ->where('medicos.matricula', '=', $matricula)
            ->whereColumn('estados.id', 'turnos.id_estado')
            ->whereBetween('fecha', [$desde, $hasta])
            ->orderBy('turnos.fecha')
            ->get(['turnos.fecha', 'estados.estado', 'medicos.nombre', 'medicos.matricula', 'turnos.dni_paciente', 'turnos.detalles']);
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
