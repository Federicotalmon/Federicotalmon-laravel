        @extends('layouts.base')
        @section('contenido')

        <a href="{{route('pacientes')}}" class="btn btn-primary col-xs-3 m-2">Volver</a>
        <h1>Crear nuevo paciente</h1>

        @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

        <form method="POST" action="{{route('paciente_store')}}" class="m-2">
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
                    <input id='dni' value="{{old('dni')}}" name='dni' class="form-control" type="number">
                </div>
                <div class="col">
                    <input type="email" value="{{old('email')}}" id='email' class="form-control" name='email'>
                </div>
                <div class="col">
                    <input type="date" id='fecha_nacimiento' value="{{old('fecha_nacimiento')}}" class="form-control" name='fecha_nacimiento'>
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
                    <input class="form-control" type="number" id='telefono' name='telefono' value="{{old('telefono')}}">
                </div>
                <div class="col">
                    <select class="p-2 m-1 bg-light border" id='drop-obras' value="{{old('drop-obras')}}" name="drop-obras" class="form-select">
                        <option hidden value="">Obra social</option>
                        @foreach($obras as $obra)
                        <option>{{$obra -> nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select class="p-2 m-1 bg-light border" id='drop-sexo' value="{{old('drop-sexo')}}" name="drop-sexo" class="form-select">
                        <option hidden value="">Sexo</option>
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