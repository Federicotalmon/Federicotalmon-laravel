@extends('layouts.base')

@section('contenido')

<a id="btnVolver" href="{{route('obras_sociales')}}" class="btn btn-primary col-xs-3">Volver
    </a>

<h1>Nueva obra social</h1>

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

<form method='POST' id="formObra" name="nuevaObra" action="{{route('obras_store')}}" class="mr-1">
    @csrf
    <div class="row">
        <div class="col">
            <p>CUIT</p>
        </div>
        <div class="col">
            <p>Nombre de la obra social</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="number" id='textCUIT' name="cuit" class="form-control" >
        </div>
        <div class="col">
            <input id='textNombre' name="nombre" class="form-control" >
        </div>
    </div>
    <div>
        <button class="m-1 btn btn-primary" id="btnGuardar">Guardar</button>
    </div>
</form>
@endsection