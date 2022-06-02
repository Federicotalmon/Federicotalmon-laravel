<title>Pacientes</title>
@extends('layouts.base')

@section('contenido')
<h1>Pacientes</h1>

<a href="{{route('dashboard')}}" class="btn btn-primary col-xs-3 m-2">Volver</a>

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div>
    <label for="btnNuevoPaciente">Agregar nuevo paciente</label>
    <a id="btnNuevoPaciente" href="{{route('paciente_create')}}" class="btn btn-primary col-xs-3">Agregar 
    </a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">DNI</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Sexo</th>
            <th scope="col">Fecha Nacimiento</th>
            <th scope="col">Obra Social</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->dni }}</td>
            <td>{{ $paciente->email}}</td>
            <td>{{ $paciente->telefono}}</td>
            <td>{{ $paciente->sexo}}</td>
            <td>{{ $paciente->fecha_nacimiento}}</td>
            <td>{{ $paciente->obra_social->nombre}}</td>
            <td>
                <form method="POST" action="{{route('paciente_delete',[
                    'dni' => $paciente->dni
                    ])}}">
                    @csrf
                    <button class="btn btn-primary col-xs-3">Eliminar</button>
                </form>
            </td>
            <td>
                <a 
                id="btnEditarPaciente"  href="{{route('paciente_edit',[
                    'dni' => $paciente->dni
                    ])}}"
                class="btn btn-primary col-xs-3">Editar
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection