@extends('layouts.base')
        @section('contenido')

        <h1>Editar paciente</h1>

        @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <a href="{{route('pacientes')}}" class="btn btn-primary col-xs-3 m-2">Volver</a>
    
        <form method="POST" action="{{route('paciente_update',['dni' => $paciente->dni])}}"  class="m-2">
            @csrf
            <div class="row">
                <div class="col">
                    <label>DNI del paciente</label>
                </div>
                <div class="col">
                    <label>Correo Electronico</label>
                </div>
                <div class="col">
                    <label>Fecha de nacimiento</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input id='dni' name='dni' class="form-control" type="number" value="{{$paciente->dni}}" readonly>
                </div>
                <div class="col">
                    <input type="email" id='email' class="form-control" name='email' value="{{$paciente->email}}">
                </div>
                <div class="col">
                    <input type="date" id='fecha_nacimiento' class="form-control" name='fecha_nacimiento'value="{{$paciente->fecha_nacimiento}}" >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="telefono">Telefono</label>
                </div>
                <div class="col">
                    <label for="">Obra Social</label>
                </div>
                <div class="col">
                    <label for="">Sexo</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="form-control" type="number" id='telefono' name='telefono' value="{{$paciente->telefono}}">
                </div>
                <div class="col">
                    <select class="p-2 m-1 bg-light border" id='drop-obras' name="drop-obras" class="form-select">
                        <option hidden value="{{$obraActual->nombre}}">{{$obraActual->nombre}}</option>
                        @foreach($obras as $obra)
                        <option value="{{$obra -> nombre}}">{{$obra -> nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select class="p-2 m-1 bg-light border" id='drop-sexo' name="drop-sexo" class="form-select">
                        <option hidden value="{{$paciente->sexo}}">{{$paciente->sexo}}</option>
                        <option value="M">M</option>
                        <option value="H">H</option>
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        @endsection