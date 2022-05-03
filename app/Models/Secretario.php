<?php

namespace App\Models;

use Illuminate\Console\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretario extends Model
{
    use HasFactory;

    protected $primaryKey = 'nombre_usuario';
    public $incrementing = false; 

    public function medico(){
        return $this->hasOne('App\Models\Medico', 'foreign_key', 'local_key');
    }


}

