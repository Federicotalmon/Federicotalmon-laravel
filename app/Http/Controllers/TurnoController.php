<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Turno;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;


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



}