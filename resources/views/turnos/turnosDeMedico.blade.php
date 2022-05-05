@extends('layouts.base')

@section('contenido')
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

<!-- Si el usuario es secretario -->
<div class="m-2 bg-white">
    <button type="submit" onclick="crearTurno('{{ $nombre }}','{{ $matricula}}')" class="btn btn-primary " id="btnGuardar">Nuevo Turno</button>
</div>

<form method='POST' id="formDetalles" class="mr-1" style="display:none;">
    <div class="row">
        <div class="col">
            <p>DNI del paciente</p>
        </div>
        <div class="col">
            <p>Fecha</p>
        </div>
        <div class="col">
            <p>Estado del turno</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id='textDNI' class="form-control">
        </div>
        <div class="col">
            <input type="text" id='textFecha' class="form-control">
        </div>

        <div class="col">
            <select class="p-2 bg-light border" id="dropEstado" class="form-select">
                @foreach($estados as $estado)
                <option>{{ $estado->estado}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Nombre del Medico</p>
        </div>
        <div class="col">
            <p>Matricula</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id='textNombreMedico' class="form-control" disabled>
        </div>
        <div class="col">
            <input type="text" id='textMatricula' class="form-control" disabled>
        </div>
    </div>
    <div>
        <p>Detalles</p>
    </div>
    <div class="row">
        <textarea id="textDetalles" cols="80" rows="5"></textarea>
    </div>
    <div class="btn-group" role="group">
        <button type="reset" onclick="cancelar()" class="m-1 btn btn-primary" id="btnCerrar">Cancelar</button>
        <button type="submit" name="action" value="nuevo" onclick="guardarNuevo()" class="m-1 btn btn-primary" id="btnGuardarNuevo" style="display:none;">Guardar Nuevo</button>
        <button type="submit" name="action" value="editado" onclick="guardarEditado()" class="m-1 btn btn-primary" id="btnGuardarEditado" style="display:none;">Guardar</button>
    </div>

</form>


<!-- Close si el usuario es secretario -->

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Medico</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Estado</th>
            <!-- Si el usuario es secretario -->
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos as $turno)
        <tr>
            <td>{{ $turno[0] }}</td>
            <td>{{ $turno[1] }}</td>
            <td>{{ $turno[2] }}</td>
            <td>{{ $turno[3] }}</td>
            <!-- Si el usuario es secretario -->
            <td><button class="m-1 btn btn-primary" onclick="editarTurno(
                    '{{ $turno[0] }}',
                    '{{ $turno[1] }}',
                    '{{ $turno[2] }}',
                    '{{ $turno[3] }}',
                    '{{ $turno[4] }}',
                    '{{ $turno[5] }}',
                    '{{ $turno[6] }}'
                )"> Editar Turno</button>
                <button class="m-1 btn btn-primary">Eliminar</button>
                <button class="m-1 btn btn-primary">Reservar</button>

            </td>

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


    function cancelar() {
        const form = document.getElementById('formDetalles');
        if (form.style.display == 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }

    function editarTurno(nombreMedico, fecha, hora, estado, dni, detalles, matricula) {
        const btnEditado = document.getElementById('btnGuardarEditado');
        const btnNuevo = document.getElementById('btnGuardarNuevo');
        const form = document.getElementById('formDetalles');
        const textDetalles = document.getElementById('textDetalles');
        const textDni = document.getElementById('textDNI');
        const textMatricula = document.getElementById('textMatricula');
        const dropEstado = document.getElementById('dropEstado');
        const textNombreMedico = document.getElementById('textNombreMedico');
        const textFecha = document.getElementById('textFecha');

        if (form.style.display == 'none')
            form.style.display = 'block';

        textDetalles.innerText = detalles;
        textMatricula.value = matricula;
        textNombreMedico.value = nombreMedico;
        textFecha.value = fecha + " " + hora;
        if (dni != null)
            textDni.value = dni;
        else
            textDni.value = " "
        dropEstado.value = estado;

        btnEditado.style.display = 'block';
        btnNuevo.style.display = 'none';
    }

    function crearTurno(nombreMedico, matricula) {
        const btnEditado = document.getElementById('btnGuardarEditado');
        const btnNuevo = document.getElementById('btnGuardarNuevo');
        const form = document.getElementById('formDetalles');
        const textMatricula = document.getElementById('textMatricula');
        const textNombreMedico = document.getElementById('textNombreMedico');

        if (form.style.display == 'none')
            form.style.display = 'block';

        btnEditado.style.display = 'none';
        btnNuevo.style.display = 'block';

        textMatricula.value = matricula;
        textNombreMedico.value = nombreMedico;

    }
</script>