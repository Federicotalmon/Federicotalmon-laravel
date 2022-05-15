@extends('layouts.base')

@section('contenido')

<a href="{{route('turnos_de_paciente')}}" class="btn btn-primary col-xs-3">Volver</a>

<h1>Detalles del turno</h1>

<form class="bg light form-control">
    <div class="row">
        <label class="col 3 " for="inputDNI" >DNI</label>
        <label class="col 3" for="inputFecha">Fecha y Hora</label>
    </div>
    <div class="row">
        <input class="col 3 form-control m-1" value="{{$turno->dni_paciente}}" readonly>
        <input class="col 3 form-control m-1" value="{{$turno->fecha}}"  readonly>
    </div>
    <div class="row">
        <label class="col 3 " for="inputDNI">Nombre de medico</label>
        <label class="col 3" for="inputFecha">Matricula</label>
        <label class="col 3" for="inputHora">Estado</label>
    </div>
    <div class="row">
        <input class="col 3 form-control m-1" value="{{$medico}}" readonly>
        <input class="col 3 form-control m-1" value="{{$turno->matricula_medico}}" readonly>
        <input class="col 3 form-control m-1" value="{{$estado}}" readonly>
    </div>
    <div class="row">
        <label>Detalles</label>
    </div>
    <div class="row">
        <textarea name="" id="" cols="60" rows="5" readonly>{{$turno->detalles}}</textarea>
    </div>
</form>
@endsection