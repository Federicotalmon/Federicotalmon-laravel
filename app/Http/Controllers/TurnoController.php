<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Estado;
use Illuminate\Database\Eloquent\Collection;


class TurnoController extends Controller
{
    
    public function getTurnosMedico($matricula){

        $turnos_sin_separar = Turno::getTurnosMedico($matricula);
        $estados = Estado::getEstados();
        $medico = Turno::getMedico($matricula);

        $turnos = new Collection();
        
        foreach($turnos_sin_separar as $turno_sin_separar){
            $fecha = $turno_sin_separar->fecha;
            $date_arr= explode(" ", $fecha);
            $anio_mes_dia= explode("-",$date_arr[0]);
            $anio = $anio_mes_dia[0];  
            $mes = $anio_mes_dia[1];
            $dia = $anio_mes_dia[2];

            $dia_mes_anio=$dia."-".$mes."-".$anio;

            $hora= $date_arr[1];
            $turno=[$turno_sin_separar->nombre,$dia_mes_anio,$hora,$turno_sin_separar->estado,$turno_sin_separar->dni_paciente,$turno_sin_separar->detalles,$matricula ];
            $turnos->push($turno);

        }
        
        return view('turnos.turnosDeMedico',['turnos'=>$turnos,'nombre'=>$medico->nombre,'matricula'=>$matricula,'estados'=>$estados]);
    }

    public function getTurnosMedicoFecha(Request $request, $matricula){
       
        $fecha = $request->input('input');
        $estados = Estado::getEstados();
        $turnos_sin_separar = Turno::getTurnosMedicoFecha($matricula,$fecha);

        $medico = Turno::getMedico($matricula);

        $turnos = new Collection();
        
        foreach($turnos_sin_separar as $turno_sin_separar){
            $fecha = $turno_sin_separar->fecha;
            $date_arr= explode(" ", $fecha);
            $anio_mes_dia= explode("-",$date_arr[0]);
            $anio = $anio_mes_dia[0];  
            $mes = $anio_mes_dia[1];
            $dia = $anio_mes_dia[2];

            $dia_mes_anio=$dia."-".$mes."-".$anio;

            $hora= $date_arr[1];
            $turno=[$turno_sin_separar->nombre,$dia_mes_anio,$hora,$turno_sin_separar->estado,$turno_sin_separar->dni_paciente,$turno_sin_separar->detalles,$matricula];
            $turnos->push($turno);

        }
        
        return view('turnos.turnosDeMedico',['turnos'=>$turnos,'nombre'=>$medico->nombre,'estados'=>$estados,'matricula'=>$matricula]);
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
        //
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
}
