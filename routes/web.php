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

Route::post('/turnosDePaciente', 'App\Http\Controllers\PacienteController@getTurnosPaciente')
    ->name('get_turnos_paciente')->middleware(['auth']);

Route::get('/turnosDePaciente', 'App\Http\Controllers\PacienteController@getTurnosPaciente')
    ->name('get_turnos_paciente')->middleware(['auth']);

Route::get('/turnosDePacientes', 'App\Http\Controllers\PacienteController@getTurnosPacientes')
    ->name('get_turnos_pacientes')->middleware(['auth']);

Route::get('nuevoTurno/{matricula}', 'App\Http\Controllers\TurnoController@nuevoTurno')
    ->name('nuevo_turno')->middleware(['auth']);

Route::get('editarTurno/{matricula}/{id}', 'App\Http\Controllers\TurnoController@editarTurno')
    ->name('editar_turno')->middleware(['auth']);

Route::get('medicos', 'App\Http\Controllers\MedicoController@cargarMedicos')
    ->name('medicos')->middleware(['auth']);

Route::get('createMedico', 'App\Http\Controllers\MedicoController@create')
    ->name('medicos_create')->middleware(['auth']);

Route::get('medicos/{matricula}', 'App\Http\Controllers\TurnoController@getTurnosMedico')
    ->name('turnos_de_medico')->middleware(['auth']);

Route::post('medicos', 'App\Http\Controllers\MedicoController@cargarMedicosObrasEspecialidades')
    ->name('medicosPost')->middleware(['auth']);

Route::get('createObra', 'App\Http\Controllers\ObraSocialController@create')
    ->name('obras_create')->middleware(['auth']);

Route::get('editObra/{cuit}', 'App\Http\Controllers\ObraSocialController@edit')
    ->name('obras_edit')->middleware(['auth']);

route::post('deleteObra/{cuit}', 'App\Http\Controllers\ObraSocialController@destroy')
    ->name('obras_delete');

route::post('storeObra', 'App\Http\Controllers\ObraSocialController@store')
    ->name('obras_store');

route::post('updateObra/{cuit}', 'App\Http\Controllers\ObraSocialController@update')
    ->name('obras_update');

route::post('storeTurno', 'App\Http\Controllers\TurnoController@store')
    ->name('turnos_store');

route::post('updateTurno/{id}', 'App\Http\Controllers\TurnoController@update')
    ->name('turnos_update');

route::post('deleteTurno/{id}', 'App\Http\Controllers\TurnoController@destroy')
    ->name('turnos_delete');

route::post('medicos/store', 'App\Http\Controllers\MedicoController@store')
    ->name('medicos_store');

route::get('medicos/edit/{matricula}', 'App\Http\Controllers\MedicoController@edit')
    ->name('medicos_edit');

route::post('medicos/delete/{matricula}', 'App\Http\Controllers\MedicoController@destroy')
    ->name('medicos_delete');

route::post('medicos/update/{matricula}', 'App\Http\Controllers\MedicoController@update')
    ->name('medicos_update');

route::post('medicos/updateObras/{matricula}', 'App\Http\Controllers\MedicoController@agregarObrasSociales')
    ->name('medicos_obras_update');

route::post('medicos/deleteObras/{matricula}/{obra}', 'App\Http\Controllers\MedicoController@eliminarObrasSociales')
    ->name('medicos_obra_delete');

Route::get('turnos/detalles/{id}', 'App\Http\Controllers\PacienteController@getDetallesTurno')
    ->name('detalles_turno')->middleware(['auth']);

Route::get('pacientes', 'App\Http\Controllers\PacienteController@show')
    ->name('pacientes')->middleware(['auth']);

Route::get('crearPaciente', 'App\Http\Controllers\PacienteController@create')
    ->name('paciente_create')->middleware(['auth']);

Route::post('pacienteStore', 'App\Http\Controllers\PacienteController@store')
    ->name('paciente_store')->middleware(['auth']);


Route::post('pacienteUpdate/{dni}', 'App\Http\Controllers\PacienteController@update')
    ->name('paciente_update')->middleware(['auth']);

Route::get('editarPaciente/{dni}', 'App\Http\Controllers\PacienteController@edit')
    ->name('paciente_edit')->middleware(['auth']);

Route::post('eliminarPaciente/{dni}', 'App\Http\Controllers\PacienteController@destroy')
    ->name('paciente_delete')->middleware(['auth']);


Route::get('volver_a_turnos', function () {
    return redirect()->route('turnos_de_paciente');
})
    ->name('volver')->middleware(['auth']);






require __DIR__ . '/auth.php';
