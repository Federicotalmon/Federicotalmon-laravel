@extends('layouts.base')

@section('contenido')
<h1>Editar Turno</h1>


<form method='POST' id="formDetalles" name="detalles" action="{{route('turnos_update',['id' => $turno->id,])}}" class="mr-1">
    @csrf
    <div class="row">
        <div class="col">
            <p>DNI del paciente</p>
        </div>
        <div class="col">
            <p>Fecha y Hora</p>
        </div>
        <div class="col">
            <p>Estado del turno</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id='textDNI' name="dni_paciente" class="form-control" value="{{$turno->dni_paciente}}">
        </div>
        <div class="col">
            <input type="datetime-local" id='textFecha' name="fecha" class="form-control" value="{{$fecha}}">
        </div>
        <div class="col">
            <select class="p-2 bg-light border" id="dropEstado" name="estado_turno" class="form-select">
                <option hidden>{{$estado_actual}}</option>
                @foreach ($estados as $estado){
                <option>{{$estado->estado}}</option>
                }
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Nombre del Medico</p>
        </div>
        <div class="col">
            <p>Matricula</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id='textNombreMedico' name="nombre_medico" class="form-control" value="{{$medico->nombre}}" readonly>
        </div>
        <div class="col">
            <input type="text" id='textMatricula' name="matricula_medico" class="form-control" value="{{$medico->matricula}}" readonly>
        </div>
    </div>
    <div>
        <p>Detalles</p>
    </div>
    <div class="row">
        <textarea id="textDetalles" name="detalles" cols="80" rows="5">{{$turno->detalles}}</textarea>
    </div>
    <div>
        <button class="m-1 btn btn-primary" id="btnGuardar">Guardar</button>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

</form>

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@endsection