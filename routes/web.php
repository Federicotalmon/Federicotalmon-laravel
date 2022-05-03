<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('turnos/{matricula}/fecha/',
[TurnoController::class,'getTurnosMedicoFecha'])
->name('turnos.getTurnosMedicoFecha')->middleware(['auth']);

    
Route::get('medicos','App\Http\Controllers\MedicoController@cargarMedicos')
->name('medicos')->middleware(['auth']);

Route::get('medicos/{matricula}','App\Http\Controllers\TurnoController@getTurnosMedico')
->name('turnos_de_medico')->middleware(['auth']);

Route::post('/medicos','App\Http\Controllers\MedicoController@cargarMedicosObrasEspecialidades')
->name('medicosPost')->middleware(['auth']);

Route::get('turnos_de_paciente','App\Http\Controllers\PacienteController@seleccionarPaciente')
->name('turnos_de_paciente')->middleware(['auth']);

Route::get('/volver_a_turnos',function(){
    return redirect()->route('turnos_de_paciente');
})
->name('volver')->middleware(['auth']);

Route::post('turnos_de_paciente/turnos', 'App\Http\Controllers\PacienteController@mostrarPaciente')
->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

 
require __DIR__.'/auth.php';
