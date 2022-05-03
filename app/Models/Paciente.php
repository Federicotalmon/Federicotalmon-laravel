<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';
    public $incrementing = false; 
    protected $fillable = ['email','telefono'];


    public function Obra_social(){
        return $this->belongsTo('App\Model\Obra_social','obra_social_cuit','cuit');
    }

    public function turnos(){
        return $this->hasMany('App\Models\Turno','dni_paciente','dni');
    }

    public static function getTurnosPaciente($dni){
        return DB::table('pacientes')
        ->join('turnos','dni_paciente','=','dni')
        ->join('estados','id_estado','=','estados.id')
        ->join('medicos','medicos.matricula','=','turnos.matricula_medico')
        ->where('dni',$dni)
        ->whereColumn('estados.id','turnos.id_estado')
        ->select('medicos.nombre','turnos.fecha','turnos.dni_paciente','estados.estado','turnos.matricula_medico','turnos.detalles')
        ->get();
       }   
    
}
