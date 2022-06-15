<?php

namespace App\Http\Controllers;

use App\Models\medico;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Collection;

class MedicoController extends Controller
{

    public function cargarMedicos()
    {
        $medicosObras = $this->getMedicosObrasSociales();
        $listaEspecialidades = $this->especialidades();
        $listaObras = ObraSocialController::getNombresObras();
        return view('medicos.medicosView', ['medicosObras' => $medicosObras, 'nombres_obras' => $listaObras, 'especialidades' => $listaEspecialidades]);
    }

    public function cargarMedicosObrasEspecialidades(Request $request)
    {
        $obras_query = $request->input('drop-obras');
        $especialidades_query = $request->input('drop-especialidades');
        $listaEspecialidades = $this->especialidades();
        $listaObras = ObraSocialController::getNombresObras();

        $medicos = $this->getMedicosObrasSociales();
        if ($especialidades_query != 'Especialidad' && $especialidades_query != 'Todas')
            $medicos = $medicos->where('especialidad', '=', $especialidades_query);

        if ($obras_query != 'Obra social' && $obras_query != 'Todas')
            $medicos = $medicos->where('obra', '=', $obras_query);


        return view('medicos.medicosView', ['medicosObras' => $medicos, 'nombres_obras' => $listaObras, 'especialidades' => $listaEspecialidades]);
    }

    public static function getMedicosObrasSociales()
    {

        $medicosObras = new Collection();
        $medicos = Medico::all();
        foreach ($medicos as $medico) {
            $obras = $medico->obra_social;
            foreach ($obras as $obra) {
                $medicosObras->push((object)[
                    'obra' => $obra->nombre,
                    'nombre' => $medico->nombre,
                    'matricula' => $medico->matricula,
                    'especialidad' => $medico->especialidad,
                ]);
            }
        }
        return $medicosObras;
    }


    public static function especialidades()
    {
        return Medico::distinct()->get(['especialidad']);
    }

    public static function todos()
    {
        return Medico::get(['nombre', 'especialidad', 'matricula']);
    }


    public static function getMedico($matricula)
    {
        return Medico::findOrFail($matricula);
    }

    public static function getNombreMedico($matricula)
    {
        $medico = Medico::find($matricula)->nombre;
        return $medico;
    }
}
