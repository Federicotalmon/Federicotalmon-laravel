@extends('layouts.base')

@section('contenido')


<a href="{{route('dashboard')}}" class="btn btn-primary col-xs-3 m-2">Volver</a>

<h1>Turnos de pacientes</h1>

<div class="bg-light p-1 border">
    <form method='POST' action="{{ route('pacientes.getTurnosPaciente') }}">
        @csrf
        <div class="m-3 row">
            <div class="col-3">
                <label class="form-label">Buscar por DNI</label>
            </div>
            <div class="col 3">
                <input type="number" name="dni" class="form-control">
            </div>
        </div>
        <div class="m-2">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
</div>

@if($turnos == null)
<p class="text-danger">No se encontraron turnos para este paciente</p>
@else

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">DNI de paciente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nombre Medico</th>
            <th scope="col">Detalles</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos as $turno)
        <tr>
            <td>{{ $turno->dni }}</td>
            <td>{{ $turno->fecha}}</td>
            <td>{{ $turno->matricula_medico}}</td>
            <td>
                <a href="{{route('detalles_turno', [
                    'id' => $turno->id
                    ])}}" class="btn btn-primary col-xs-3">Detalles</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endif

@endsection