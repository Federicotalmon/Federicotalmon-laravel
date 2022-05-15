<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ObraSocialController;
use App\Http\Controllers\PacienteController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('obras_sociales', [ObraSocialController::class, 'getObras'])
    ->name('obras_sociales')->middleware(['auth']);;

Route::post(
    'turnos/{matricula}/fecha/',
    [TurnoController::class, 'getTurnosMedicoFecha']
)
    ->name('turnos.getTurnosMedicoFecha')->middleware(['auth']);

Route::post(
    'turnos/paciente',
    [PacienteController::class, 'getTurnosPaciente']
)
    ->name('pacientes.getTurnosPaciente')->middleware(['auth']);


Route::get('medicos', 'App\Http\Controllers\MedicoController@cargarMedicos')
    ->name('medicos')->middleware(['auth']);

Route::get('medicos/{matricula}', 'App\Http\Controllers\TurnoController@getTurnosMedico')
    ->name('turnos_de_medico')->middleware(['auth']);

Route::post('medicos', 'App\Http\Controllers\MedicoController@cargarMedicosObrasEspecialidades')
    ->name('medicosPost')->middleware(['auth']);

Route::get('turnos_de_paciente', 'App\Http\Controllers\PacienteController@getTurnosPacientes')
    ->name('turnos_de_paciente')->middleware(['auth']);

Route::get('turnos/detalles/{id}', 'App\Http\Controllers\PacienteController@getDetallesTurno')
    ->name('detalles_turno')->middleware(['auth']);

Route::get('volver_a_turnos', function () {
    return redirect()->route('turnos_de_paciente');
})
    ->name('volver')->middleware(['auth']);






require __DIR__ . '/auth.php';
