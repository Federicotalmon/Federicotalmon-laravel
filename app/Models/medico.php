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

    public function secretario()
    {
        return $this->belongsTo('App\Models\Secretario', 'medico_matricula', 'matricula');
    }

    public function turno()
    {
        return $this->hasMany('App\Models\Turno', 'medico_matricula', 'matricula');
    }
     
    public function obra_social()
    {
        return $this->belongsToMany('App\Models\Obra_social', 'medicos_obras_sociales', 'matricula', 'cuit');
    }

}
