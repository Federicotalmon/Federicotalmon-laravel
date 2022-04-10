<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;


    public function Paciente(){
        return $this->belongsTo('App\Model\Paciente','dni_paciente','dni');
    }

    public function Medico(){
        return $this->belongsTo('App\Model\Medico','matricula_medico','matricula');
    }
}
