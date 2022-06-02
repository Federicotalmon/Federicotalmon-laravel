@extends('layouts.base')

@section('contenido')


<a href="{{route('dashboard')}}" class="btn btn-primary col-xs-3 m-2">Volver</a>

<h1>Turnos de pacientes</h1>

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<div class="bg-light p-1 border">
    <form method='POST' action="{{ route('get_turnos_paciente') }}">
        @csrf
        <div class="m-3 row">
            <div class="col-3">
                <label class="form-label">Buscar por DNI</label>
            </div>
            <div class="col 3">
                <input type="number" name="dni" id="dni" class="form-control">
            </div>
        </div>
        <div class="m-2">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">DNI de paciente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nombre Medico</th>
            <th scope="col">Detalles</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos as $turno)
        <tr>
            <td>{{ $turno->paciente->dni }}</td>
            <td>{{ $turno->fecha}}</td>
            <td>{{ $turno->medico->nombre}}</td>
            <td>
                <a href="{{route('detalles_turno', [
                    'id' => $turno->id
                    ])}}" class="btn btn-primary col-xs-3">Detalles</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection