@extends('layouts.base')

@section('contenido')

<a id="btnVolver" href="{{route('medicos')}}" class="btn btn-primary col-xs-3">Volver
</a>

<h1>Agregar/Quitar Obras sociales</h1>

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
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">CUIT</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todas as $obra)
        <tr>
            <td>{{ $obra->cuit }}</td>
            <td>{{ $obra->nombre}}</td>
            <td>
                @if($obrasMedico->contains('cuit',$obra->cuit))
               
                <form method='POST' id="quitarObra" name="quitarObra" action="{{route('medico_quitar_obra',['matricula' => $matricula,'cuit' => $obra->cuit])}}" >
                    @csrf
                    <button class="btn btn-danger col-xs-3">Quitar</button>
                </form>
                @else
                <form method='POST' id="agregarObra" name="agregarObra" action="{{route('medico_agregar_obra',['matricula' => $matricula,'cuit' => $obra->cuit])}}" >
                    @csrf
                    <button class="btn btn-success col-xs-3">Agregar</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>




@endsection