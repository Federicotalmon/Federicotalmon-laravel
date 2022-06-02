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
        return $this->belongsTo('App\Models\Obra_social','obra_social_cuit','cuit');
    }

    public function turnos(){
        return $this->hasMany('App\Models\Turno','dni_paciente','dni');
    }

}
