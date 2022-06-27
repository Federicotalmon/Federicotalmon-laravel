@extends('layouts.base')

@section('contenido')

<a id="btnVolver" href="{{route('medicos')}}" class="btn btn-primary col-xs-3">Volver
</a>

<h1>Editar Medico</h1>

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

<form method='POST' id="formMedico" name="editarMedico" action="{{route('medicos_update', ['matricula' => $medico->matricula])}}" class="mr-1">
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
            <input type="number" id='textMatricula' name="matricula" class="form-control" value="{{$medico->matricula}}" readonly>
        </div>
        <div class="col">
            <input id='textNombre' id="textNombre" name="nombre" class="form-control" value="{{$medico->nombre}}">
        </div>
        <div class="col">
            <input id='textEspecialidad' name="especialidad" class="form-control" value="{{$medico->especialidad}}">
        </div>
    </div>
    <div>
        <label for="btnGuardar">Guardar cambios de medico</label>
        <button class="m-1 btn btn-primary" id="btnGuardar">Guardar</button>
    </div>
    <div>
    <a id="btnEditarObra" href="{{route('medicos_obras_edit',['matricula' => $medico->matricula])}}" 
                class="btn btn-primary col-xs-3">Editar Obras
                </a>
    </div>
</form>
@endsection