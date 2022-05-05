<title>Obras Sociales</title>
@extends('layouts.base')

@section('contenido')
<h1>Obras Sociales</h1>

<button type="submit" class="btn btn-primary m-2" id="btnNuevo" onclick="crearObra()">Nueva Obra</button>

<div class="bg-light border">
    <form method='POST' id="formObra" class="" style="display:none;">
        <div class="m-2 row">
            <div class="col">
                <p>Nombre Obra Social</p>
            </div>
            <div class="col">
                <input type="text" id="nombreInput">
            </div>
        </div>
        <div class="m-2 row">
            <div class="col">
                <p>CUIT</p>
            </div>
            <div class="col">
                <input type="text" id="cuitInput">
            </div>
        </div>
        <div class="btn-group" role="group">
            <button type="reset" onclick="cancelar()" class="m-1 btn btn-primary" id="btnCerrar">Cancelar</button>
            <button type="submit" name="action" value="nuevo" onclick="guardarNuevo()" class="m-1 btn btn-primary" id="btnGuardarNuevo" style="display:none;">Guardar Nueva</button>
            <button type="submit" name="action" value="editado" onclick="guardarEditado()" class="m-1 btn btn-primary" id="btnGuardarEditado" style="display:none;">Guardar</button>
        </div>
    </form>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">CUIT</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($obras as $obra)
        <tr>
            <td>{{ $obra->cuit }}</td>
            <td>{{ $obra->nombre}}</td>
            <td>
                <button name="btnEditar" class="btn btn-primary m-1" onclick="editarObra(
                    '{{ $obra->cuit }}',
                    '{{ $obra->nombre }}'
                    )">Editar</button>
                <button name="btnEliminar" class="btn btn-primary m-1">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<script>
    function crearObra() {
        const btnEditado = document.getElementById('btnGuardarEditado');
        const btnNuevo = document.getElementById('btnGuardarNuevo');
        const form = document.getElementById('formObra');
        const textCuit = document.getElementById('cuitInput');
        const textNombre = document.getElementById('nombreInput');
        const botonesEditar = document.getElementsByName('btnEditar');

        if (form.style.display == 'none')
            form.style.display = 'block';

        textCuit.disabled = false;
        textCuit.value = "";
        textNombre.value = "";
        btnEditado.style.display = 'none';
        btnNuevo.style.display = 'block';
    }

    function editarObra(cuit, nombre) {
        const btnEditado = document.getElementById('btnGuardarEditado');
        const btnNuevo = document.getElementById('btnGuardarNuevo');
        const form = document.getElementById('formObra');
        const textCuit = document.getElementById('cuitInput');
        const textNombre = document.getElementById('nombreInput');
        const botonesEditar = document.getElementsByName('btnEditar');
        if (form.style.display == 'none')
            form.style.display = 'block';

        btnEditado.style.display = 'block';
        btnNuevo.style.display = 'none';

        textCuit.disabled = true;
        textCuit.value = cuit;
        textNombre.value = nombre;

    }

    function cancelar() {
        const form = document.getElementById('formObra');
        if (form.style.display == 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>