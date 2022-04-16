<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';
    public $incrementing = false; 

    public function Obra_social(){
        return $this->belongsTo('App\Model\Obra_social','obra_social_cuit','cuit');
    }

    public function turnos(){
        return $this->hasMany('App\Model\Turno','dni_paciente','dni');
    }
}
