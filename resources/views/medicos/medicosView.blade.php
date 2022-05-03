@extends('layouts.base')

@section('contenido')

    <h1>Medicos</h1>
    <form method="POST" action="{{route('medicosPost')}}">
        @csrf
        <select class="p-2 bg-light border" name="drop-obras" class="form-select" >
            <option hidden>Obra social</option>
            <option >Todas</option>
            @foreach($nombres_obras as $obra)
                <option >{{ $obra->nombre}}</option>    
            @endforeach          
        </select>

        <select  class="p-2 bg-light border" name="drop-especialidades" class="form-select" >
        <option hidden>Especialidad</option>
        <option >Todas </option>
        @foreach($especialidades as $especialidad)
            <option >{{$especialidad->especialidad}}</option>    
         @endforeach          
        </select>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

  
    @if (($medicos ->count()) == 0)
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
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->nombre_obra}}</td>
                <td><a href="{{ route('turnos_de_medico', ['matricula' => $medico->matricula]) }}">{{ $medico->nombre_medico}}</a></td>
                <td>{{ $medico->matricula}}</td>
                <td>{{ $medico->especialidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection