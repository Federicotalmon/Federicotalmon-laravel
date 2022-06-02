<title>Obras Sociales</title>
@extends('layouts.base')

@section('contenido')
<h1>Obras Sociales</h1>

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div>
    <label for="btnNuevaObra">Agregar obra social</label>
    <a id="btnNuevaObra" href="{{route('obras_create')}}" class="btn btn-primary col-xs-3">Agregar 
    </a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">CUIT</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($obras as $obra)
        <tr>
            <td>{{ $obra->cuit }}</td>
            <td>{{ $obra->nombre}}</td>
            <td>
                <form method="post" action="{{route('obras_delete',['cuit' => $obra->cuit,])}}">
                    @csrf
                    <button class="btn btn-primary col-xs-3">Eliminar</button>
                </form>
            </td>
            <td>
                <a 
                id="btnEditarObra" href="{{route('obras_edit',['cuit' => $obra->cuit,])}}" 
                class="btn btn-primary col-xs-3">Editar
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection