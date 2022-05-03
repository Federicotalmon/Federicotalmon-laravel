@extends('layouts.base')

@section('contenido')
    <h1>Turnos del paciente</h1>

    <form method="POST" action="turnos_de_paciente/turnos">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ingrese DNI del paciente</label>
            <input type="number" name="dni" class="form-control" >
        </div>
         <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
   @endsection