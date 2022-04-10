<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra_social extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'obras_sociales';
    use HasFactory;

    protected $primaryKey = 'cuit';
    public $incrementing = false; 

    public function Paciente(){
        return $this->HasMany('App\Models\Paciente','obra_social_cuit','cuit');
    }

    public function medicos(){
        return $this->belongsToMany('App\Model\Medico','medicos_obras_sociales','id', 'matricula');
    }
    
}
