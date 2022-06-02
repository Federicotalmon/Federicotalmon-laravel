@extends('layouts.base')

@section('contenido')

<a href="{{route('medicos')}}" class="btn btn-primary col-xs-3 m-2">Volver</a>

<h1>Turnos del medico {{$nombre}}</h1>

<div class="p-2 bg-light border">
    <form method='POST' action="{{ route('turnos.getTurnosMedicoFecha', ['matricula' => $matricula]) }}">
        @csrf
        <div class="row">
            <label>Fecha</label>
        </div>
        <div>
            <input oninput="validarFecha()" class="col-xs-2" id='date' name="input" placeholder="DD-MM-YYYY">
        </div>
        <div>
            <p id='inputInvalido' class="text-danger">Ingrese una fecha en formato valido</p>
        </div>
        <div>
            <button type="submit" id="button" disabled='true' class="btn btn-primary">Aceptar</button>
        </div>
    </form>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Medico</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos as $turno)

        <tr>
            <td>{{ $turno[2]->medico->nombre }}</td>
            <td>{{ $turno[0] }}</td>
            <td>{{ $turno[1] }}</td>
            <td>{{ $turno[2]->estado->estado }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

<script>
    function validarFecha() {

        var inputInvalido = document.getElementById("inputInvalido");
        var fecha = document.getElementById("date").value;
        var button = document.getElementById("button");

        if ((checkIfValidDate(fecha) == false)) {
            inputInvalido.style.visibility = "visible"
            button.disabled = true;
        } else {
            inputInvalido.style.visibility = "hidden"
            button.disabled = false;
        }

    }

    function checkIfValidDate(str) {
        // Regular expression to check if string is valid date
        const regexExp = /^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/

        ///^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/

        return regexExp.test(str);
    }
</script>