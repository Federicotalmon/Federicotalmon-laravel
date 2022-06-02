<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $fillable = ['matricula_medico','estado', 'fecha', 'detalles'];

    public function Paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'dni_paciente', 'dni');
    }

    public function medico()
    {
        return $this->belongsTo('App\Models\medico', 'matricula_medico', 'matricula');
    }

    public function Estado()
    {
        return $this->belongsTo('App\Models\Estado', 'id_estado', 'id');
    }
}
