<?php

namespace App\Models;

use Illuminate\Console\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretario extends Model
{
    use HasFactory;

    protected $primaryKey = 'usuario';
    public $incrementing = false; 

    public function medico(){
        return $this->hasOne('App\Models\medico', 'foreign_key', 'local_key');
    }


}

