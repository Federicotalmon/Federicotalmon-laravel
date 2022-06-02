<title>Obras Sociales</title>
@extends('layouts.base')

@section('contenido')
<h1>Obras Sociales</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">CUIT</th>
            <th scope="col">Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($obras as $obra)
        <tr>
            <td>{{ $obra->cuit }}</td>
            <td>{{ $obra->nombre}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection