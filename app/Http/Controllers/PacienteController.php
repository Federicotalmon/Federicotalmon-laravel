<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTurnosPacientes()
    {
        $turnos_pacientes = Paciente::getTurnosTodosPacientes();
        if ($turnos_pacientes->isEmpty())
            return view('pacientes.turnosPaciente', ['turnos' => null]);
        else
            return view('pacientes.turnosPaciente', ['turnos' => $turnos_pacientes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getTurnosPaciente(Request $request)
    {
        $dni = $request->input('dni');
        $turnos_paciente = Paciente::getTurnosPaciente($dni);
        if ($turnos_paciente->isEmpty())
            return view('pacientes.turnosPaciente', ['turnos' => null]);
        else
            return view('pacientes.turnosPaciente', ['turnos' => $turnos_paciente]);
    }
}
