@extends('layouts.base')

@section('contenido')

    <form method="GET" action="{{route('volver')}}">
         <button type="submit" class="btn btn-primary">Volver</button>
    </form>
    
        <form id="formDetalles"class= "mr-1" style="display:none;">
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
                    <input type="text" id='textDNI' class="form-control" disabled>
                </div>
                <div class="col">
                    <input type="text" id='textFecha'class="form-control" disabled>
                </div>
                <div class="col">
                    <input type="text" id='textEstado' class="form-control" disabled>
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
                    <input type="text" id='textMatricula'class="form-control" disabled>
                </div>
            </div>
            <div>
            <p>Detalles</p>
            </div>
            <div class="row">
                <textarea  id="textDetalles" cols="80" rows="5" disabled></textarea>
            </div>
            <div >
                <button type="reset" onclick="cerrar()" class="btn btn-primary col-xs-3 "  id="btnCerrar" >Cerrar</button>
            </div>

        </form>
  
    @if($turnos == null)
        <p class="text-danger">No se encontraron turnos para este paciente</p>
    @else
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">DNI de paciente</th>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre Mmedico</th>
                <th scope="col">Detalles</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turnos as $turno)
            <tr>
                <td>{{ $turno->dni_paciente }}</td>
                <td>{{ $turno->fecha}}</td>
                <td>{{ $turno->matricula_medico}}</td>
                <td><button onclick="abrirForm(
                    '{{ $turno->dni_paciente }}',
                    '{{ $turno->matricula_medico}}',
                    '{{ $turno->estado}}',
                    '{{ $turno->detalles}}',
                    '{{ $turno->nombre}}',
                    '{{ $turno->fecha}}'
                )">detalles</button>
                </td>
            </tr>
             @endforeach           
        </tbody>
    </table>

    
    @endif
    <script>
const form = document.getElementById('formDetalles');

function cerrar() {

    if (form.style.display == 'none') {          
        form.style.display = 'block';
    } 
    else {        
        form.style.display = 'none';
    }
}

function abrirForm(dni,matricula,estado,detalles,nombreMedico,fecha) {
    
    const textDetalles = document.getElementById('textDetalles');
    const textDni = document.getElementById('textDNI');
    const textMatricula = document.getElementById('textMatricula');
    const textEstado = document.getElementById('textEstado');
    const textNombreMedico = document.getElementById('textNombreMedico');
    const textFecha = document.getElementById('textFecha');

    if (form.style.display == 'none')          
            form.style.display = 'block';
    
    textDetalles.innerText = detalles;
    textMatricula.value = matricula;
    textNombreMedico.value = nombreMedico;
    textFecha.value = fecha;
    textDni.value = dni;
    textEstado.value = estado;   
}

</script>
   @endsection

