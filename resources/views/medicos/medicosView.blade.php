@extends('layouts.base')

@section('contenido')

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
<div class="container m-3">
    <div>
        <button type="submit" name="action" value="nuevo" onclick="crearMedico()" class="m-1 btn btn-primary" id="btnGuardarNuevo" >Nuevo</button>
    </div>
</div>

<form method='POST' id="formMedico" style="display:none;" class="m-3 p-3 border bg-light">
    <div class="row">
        <div class="col">
            <p>Matricula del Medico</p>
        </div>
        <div class="col">
            <p>Nombre</p>
        </div>
        <div class="col">
            <p>Especialidad</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id='textMatricula' class="form-control">
        </div>
        <div class="col">
            <input type="text" id='textNombre' class="form-control">
        </div>
        <div class="col">
            <input type="text" id='textEspecialidad' class="form-control">
        </div>
    </div>
    <div class="btn-group" role="group">
        <button type="submit" class="m-2 btn btn-primary">Guardar</button>
        <button type="reset" class="m-2 btn btn-primary" onclick="cancelar()">Cancelar</button>
    </div>

</form>

<div class="containter m-1 border bg-light">
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
</div>

@endsection

<script>
    function crearMedico() {
        const form = document.getElementById('formMedico');

        if (form.style.display == 'none')
            form.style.display = 'block';
    }


    function cancelar() {
        const form = document.getElementById('formMedico');
        if (form.style.display == 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>