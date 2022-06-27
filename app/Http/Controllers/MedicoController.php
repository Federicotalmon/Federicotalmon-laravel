<?php

namespace App\Http\Controllers;

use App\Models\medico;
use Illuminate\Http\Request;
use App\Http\Requests\MedicoStoreRequest;
use App\Http\Requests\EditarMedicoRequest;
use App\Models\Obra_social;
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

    public function cargarObrasMedico($matricula)
    {
        $todas = Obra_social::all();
        $obrasMedico = $this->cuitsMedico($matricula);
        return view('medicos.medicosObrasEdit', ['matricula' => $matricula,'obrasMedico' => $obrasMedico, 'todas' => $todas]);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.medicoCrear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoStoreRequest $request)
    {
        $medico = new medico();
        $medico->matricula = $request->matricula;
        $medico->nombre = $request->nombre;
        $medico->especialidad = $request->especialidad;
        $medico->save();
        return redirect()->back()->with('message', 'Medico creado correctamente!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($matricula)
    {
        $medico = $this->getMedico($matricula);
        $listaObras = ObraSocialController::getNombresObras();
        return view('medicos.medicoEditar', ['medico' => $medico, 'obras' => $listaObras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarMedicoRequest $request, $matricula)
    {
        $medico = $this->getMedico($matricula);
        $medico->matricula = $request->matricula;
        $medico->nombre = $request->nombre;
        $medico->especialidad = $request->especialidad;
        $medico->save();
        return redirect()->back()->with('message', 'Medico actualizado correctamente!');
    }

    public function agregarObraSocial($matricula,$cuit){
        $medico = Medico::findOrFail($matricula);
        $medico->obra_social()->attach($cuit);
        return redirect()->back()->with('message', 'Obra agregada correctamente!');

    }

    public function quitarObraSocial($matricula,$cuit){
        $medico = Medico::findOrFail($matricula);
        $medico->obra_social()->detach($cuit);
        return redirect()->back()->with('message', 'Obra quitada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = $this->getMedico($id);
        $medico->delete();
        return redirect()->back()->with('message', 'Medico eliminado correctamente!');
    }

    public static function getMedicosObrasSociales()
    {

        $medicosObras = new Collection();
        $medicos = Medico::all();
        foreach ($medicos as $medico) {
            $obras = $medico->obra_social;
            if($obras->count() == 0)
            $medicosObras->push((object)[
                'obra' => null,
                'nombre' => $medico->nombre,
                'matricula' => $medico->matricula,
                'especialidad' => $medico->especialidad,
            ]);
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

    public static function cuitsMedico($matricula){
        $medico = Medico::findOrFail($matricula);
        $obras = $medico ->obra_social;
        $listObras = new Collection();
        foreach ($obras as $obra){
            $listObras->push((object)[
                'cuit' => $obra->cuit,
                ]);
        }
        return $listObras;
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
