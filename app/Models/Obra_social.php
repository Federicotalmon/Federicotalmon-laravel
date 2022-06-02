<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Obra_social extends Model
{
    
    protected $table = 'obras_sociales';

    protected $fillable = ['nombre'];

    use HasFactory;

    protected $primaryKey = 'cuit';
    public $incrementing = false; 

    public function Paciente(){
        return $this->HasMany('App\Models\Paciente','obra_social_cuit','cuit');
    }

    public function medicos(){
        return $this->belongsToMany('App\Models\medico','medicos_obras_sociales','cuit', 'matricula');
    }



    
}
