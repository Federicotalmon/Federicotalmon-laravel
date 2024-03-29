@extends('layouts.base')

@section('contenido')

<a href="{{route('dashboard')}}" class="btn btn-primary col-xs-3 m-2">Volver</a>

<h1>Medicos</h1>


<form method="POST" action="{{route('medicosPost')}}">
    @csrf
    <select class="p-2 bg-light border" name="drop-obras" class="form-select">
        <option hidden>Obra social</option>
        <option>Todas</option>
        @foreach($nombres_obras as $obra)
        <option>{{ $obra->nombre}}</option>
        @endforeach
    </select>

    <select class="p-2 bg-light border" name="drop-especialidades" class="form-select">
        <option hidden>Especialidad</option>
        <option>Todas </option>
        @foreach($especialidades as $especialidad)
        <option>{{$especialidad->especialidad}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>


<div class="containter m-1 border bg-light">
    @if (($medicosObras ->isEmpty()))
    <p class="text-danger">No se encontraron medicos para esta consulta</p>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Obra Social</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nº de Matricula</th>
                <th scope="col">Especialidad</th>

            </tr>
        </thead>
        <tbody>
            @foreach($medicosObras as $medicoObra)
            <tr>
                <td>{{ $medicoObra->obra }}</td>
                <td><a href="{{ route('turnos_de_medico', ['matricula' => $medicoObra->matricula] ) }}">{{ $medicoObra->nombre }}</a></td>
                <td>{{ $medicoObra->matricula }}</td>
                <td>{{ $medicoObra->especialidad }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection