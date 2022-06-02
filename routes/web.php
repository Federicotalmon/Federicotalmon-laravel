<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ObraSocialController;



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('obras_sociales', 'App\Http\Controllers\ObraSocialController@getObras')
    ->name('obras_sociales')->middleware(['auth']);;

Route::post('turnos_medico_fecha/{matricula}', 'App\Http\Controllers\TurnoController@getTurnosMedicoFecha')
    ->name('turnos.getTurnosMedicoFecha')->middleware(['auth']);
Route::get('turnos_medicos/{matricula}', 'App\Http\Controllers\TurnoController@getTurnosMedico')
    ->name('turnos_de_medico')->middleware(['auth']);

Route::post('/turnosPaciente', 'App\Http\Controllers\PacienteController@getTurnosPaciente')
    ->name('get_turnos_paciente')->middleware(['auth']);
Route::get('/turnosDePaciente', 'App\Http\Controllers\PacienteController@getTurnosPaciente')
    ->name('get_turnos_paciente')->middleware(['auth']);
Route::get('/turnosDePacientes', 'App\Http\Controllers\PacienteController@getTurnosPacientes')
    ->name('get_turnos_pacientes')->middleware(['auth']);
Route::get('pacientes', 'App\Http\Controllers\PacienteController@show')
    ->name('pacientes')->middleware(['auth']);
Route::get('turnos/detalles/{id}', 'App\Http\Controllers\PacienteController@getDetallesTurno')
    ->name('detalles_turno')->middleware(['auth']);


Route::get('medicos', 'App\Http\Controllers\MedicoController@cargarMedicos')
    ->name('medicos')->middleware(['auth']);
Route::post('medicos', 'App\Http\Controllers\MedicoController@cargarMedicosObrasEspecialidades')
    ->name('medicosPost')->middleware(['auth']);


Route::get('volver_a_turnos', function () {
    return redirect()->route('turnos_de_paciente');
})
    ->name('volver')->middleware(['auth']);

require __DIR__ . '/auth.php';
