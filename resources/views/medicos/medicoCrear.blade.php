@extends('layouts.base')

@section('contenido')

<a id="btnVolver" href="medicos_create" class="btn btn-primary col-xs-3">Volver
</a>

<h1>Nuevo Medico</h1>

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<form method='POST' id="formMedico" name="crearMedico" action="{{route('medicos_store')}}" class="mr-1">
    @csrf
    <div class="row">
        <div class="col">
            <p>Matricula</p>
        </div>
        <div class="col">
            <p>Nombre del medico</p>
        </div>
        <div class="col">
            <p>Especialidad</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="number" id='textMatricula' name="matricula" class="form-control" >
        </div>
        <div class="col">
            <input id='textNombre' id="textNombre" name="nombre" class="form-control">
        </div>
        <div class="col">
            <input id='textEspecialidad' name="especialidad" class="form-control" >
        </div>
    </div>
    <div>
        <button class="m-1 btn btn-primary" id="btnGuardar">Guardar</button>
    </div>
</form>
@endsection