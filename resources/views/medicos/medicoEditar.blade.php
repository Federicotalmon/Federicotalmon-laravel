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
</form>

<form method="POST" class=".bg-light m-1" action="{{route('medicos_obras_update',['matricula' => $medico->matricula])}}">
    @csrf
    <div>
        <label for="btnUpdateObras">Agregar obra social </label>
        <select class="p-2 m-1 bg-light border" name="drop-obras" class="form-select">
            <option hidden value="">Obra social</option>
            @foreach($obras as $obra)
            <option value="{{$obra->nombre}}">{{ $obra->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit" id="btnUpdateObras" class="btn btn-primary col-xs-3 m-1">Guardar</button>
    </div>
</form>
@endsection