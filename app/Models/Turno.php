<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Turno extends Model
{
    use HasFactory;
    protected $fillable = ['estado','fecha','detalles'];

    public function Paciente(){
        return $this->belongsTo('App\Models\Paciente','dni_paciente','dni');
    }

    public function Medico(){
        return $this->belongsTo('App\Models\Medico','matricula_medico','matricula');
    }

    public function Estado(){
        return $this->belongsTo('App\Models\Estado');
    }

    public static function getTurnosMedico($matricula){
        return DB::table('turnos')
        ->join('medicos','matricula_medico','=','matricula')
        ->join('estados','turnos.id_estado','=','estados.id')
        ->where('medicos.matricula','=',$matricula)
        ->whereColumn('estados.id','turnos.id_estado')
        ->select('turnos.fecha','estados.estado','medicos.nombre','medicos.matricula')
        ->orderBy('turnos.fecha')
        ->get();  
       }

    public static function getTurnosMedicoFecha($matricula,$fecha){
        $desde = Carbon::createFromFormat('d-m-Y', $fecha)->startOfDay();
        $hasta = Carbon::createFromFormat('d-m-Y', $fecha)->endOfDay();
        return DB::table('turnos')
        ->join('medicos','matricula_medico','=','matricula')
        ->join('estados','turnos.id_estado','=','estados.id')
        ->where('medicos.matricula','=',$matricula)
        ->whereColumn('estados.id','turnos.id_estado')
        ->whereBetween('fecha',[$desde, $hasta])
        ->select('turnos.fecha','estados.estado','medicos.nombre','medicos.matricula')
        ->orderBy('turnos.fecha')
        ->get();  
    }

    public static function getMedico($matricula){
        return DB::table('turnos')
        ->join('medicos','matricula_medico','=','matricula')
        ->where('matricula','=',$matricula)
        ->select('medicos.nombre')->get()
        ->first();
    }
    
}
