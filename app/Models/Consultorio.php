<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Consultorio extends Model
{
    use HasFactory;

    public function medicos(){
        return $this->belongsToMany('App\Model\Medico','consultorios_medicos','id', 'matricula');
    }

}
