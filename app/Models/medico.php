<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'matricula';
    public $incrementing = false; 

    public function secretario(){
        return $this->belongsTo('App\Model\Secretario', 'medico_matricula', 'matricula');
    }

    public function turno(){
        return $this->belongsTo('App\Model\Turno', 'medico_matricula', 'matricula');
    }
    
    public function obra_social(){
        return $this->belongsToMany('App\Model\Obra_social','medicos_obras_sociales','matricula', 'cuit');
    }

    public function consultorio(){
        return $this->belongsToMany('App\Model\Consultorio','consultorios_medicos','matricula', 'id');
    }

}
