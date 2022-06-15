<title>Pacientes</title>
@extends('layouts.base')

@section('contenido')
<h1>Pacientes</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">DNI</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Sexo</th>
            <th scope="col">Fecha Nacimiento</th>
            <th scope="col">Obra Social</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection