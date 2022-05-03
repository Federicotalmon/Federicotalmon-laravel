<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Medico extends Model
{
    use HasFactory;
    
    protected $fillable = ['especialidad'];

    protected $primaryKey = 'matricula';
    public $incrementing = false; 

    public function secretario(){
        return $this->belongsTo('App\Models\Secretario', 'medico_matricula', 'matricula');
    }

    public function turno(){
        return $this->hasMany('App\Models\Turno', 'medico_matricula', 'matricula');
    }
    
    public function obra_social(){
        return $this->belongsToMany('App\Models\Obra_social','medicos_obras_sociales','matricula', 'cuit');
    }

    public static function todos(){
        return DB::table('medicos')
        ->select('nombre','especialidad','matricula')
        ->get();
    }

    public static function getMedicosObrasSociales(){
        return DB::table('medicos')
        ->join('medicos_obras_sociales','medicos.matricula','=','medicos_obras_sociales.matricula')
        ->join('obras_sociales','medicos_obras_sociales.cuit','=','obras_sociales.cuit')
        ->select('medicos.nombre as nombre_medico','medicos.matricula','medicos.especialidad','obras_sociales.nombre as nombre_obra',)
        ->get() ;
    }

    public static function especialidades(){
        return Medico::distinct()->get(['especialidad']);
    }

    public static function getMedico($matricula){
        return DB::table('medicos')
        ->where('matricula',$matricula)
        ->get();
    }

}