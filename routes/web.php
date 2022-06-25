<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('obras_sociales', 'App\Http\Controllers\ObraSocialController@getObras')->name('obras_sociales')->middleware(['auth']);
Route::get('obras_sociales/create', 'App\Http\Controllers\ObraSocialController@create')->name('obras_create')->middleware(['auth'])->middleware(['auth']);
Route::get('obras_sociales/edit/{cuit}', 'App\Http\Controllers\ObraSocialController@edit')->name('obras_edit')->middleware(['auth'])->middleware(['auth']);
Route::post('obras_sociales/delete/{cuit}', 'App\Http\Controllers\ObraSocialController@destroy')->name('obras_delete')->middleware(['auth']);
Route::post('obras_sociales/store', 'App\Http\Controllers\ObraSocialController@store')->name('obras_store')->middleware(['auth']);
Route::post('obras_sociales/update/{cuit}', 'App\Http\Controllers\ObraSocialController@update')->name('obras_update')->middleware(['auth']);

Route::get('turno/medico/create/{matricula}', 'App\Http\Controllers\TurnoController@nuevoTurno')->name('nuevo_turno')->middleware(['auth'])->middleware(['auth']);
Route::get('turno/medico/edit/{matricula}/{id}', 'App\Http\Controllers\TurnoController@editarTurno')->name('editar_turno')->middleware(['auth'])->middleware(['auth']);
Route::get('turno/medico/{matricula}', 'App\Http\Controllers\TurnoController@getTurnosMedico')->name('turnos_de_medico')->middleware(['auth'])->middleware(['auth']);
Route::post('turno/medico/fecha/{matricula}','App\Http\Controllers\TurnoController@getTurnosMedicoFecha')->name('turnos.getTurnosMedicoFecha')->middleware(['auth']);
Route::post('turno/medico/store', 'App\Http\Controllers\TurnoController@store')->name('turnos_store')->middleware(['auth']);
Route::post('turno/medico/update/{id}', 'App\Http\Controllers\TurnoController@update')->name('turnos_update')->middleware(['auth']);
Route::post('turno/medico/delete/{id}', 'App\Http\Controllers\TurnoController@destroy')->name('turnos_delete')->middleware(['auth']);


Route::get('medicos/edit/{matricula}', 'App\Http\Controllers\MedicoController@edit')->name('medicos_edit')->middleware(['auth']);
Route::get('medicos/cargar', 'App\Http\Controllers\MedicoController@cargarMedicos')->name('medicos')->middleware(['auth'])->middleware(['auth']);
Route::get('medicos/create', 'App\Http\Controllers\MedicoController@create')->name('medicos_create')->middleware(['auth'])->middleware(['auth']);
Route::post('medicos/delete/{matricula}', 'App\Http\Controllers\MedicoController@destroy')->name('medicos_delete')->middleware(['auth']);
Route::post('medicos/obras/especialidades', 'App\Http\Controllers\MedicoController@cargarMedicosObrasEspecialidades')->name('medicosPost')->middleware(['auth'])->middleware(['auth']);
Route::post('medicos/store', 'App\Http\Controllers\MedicoController@store')->name('medicos_store')->middleware(['auth']);
Route::post('medicos/update/{matricula}', 'App\Http\Controllers\MedicoController@update')->name('medicos_update')->middleware(['auth']);
Route::post('medicos/updateObras/{matricula}', 'App\Http\Controllers\MedicoController@agregarObrasSociales')->name('medicos_obras_update')->middleware(['auth']);
Route::post('medicos/deleteObras/{matricula}/{obra}', 'App\Http\Controllers\MedicoController@eliminarObrasSociales')->name('medicos_obra_delete')->middleware(['auth']);


Route::get('turnos/paciente', 'App\Http\Controllers\PacienteController@getTurnosPaciente')->name('get_turnos_paciente')->middleware(['auth']);
Route::get('turnos/pacientes', 'App\Http\Controllers\PacienteController@getTurnosPacientes')->name('get_turnos_pacientes')->middleware(['auth']);
Route::get('turnos/pacientes/detalles/{id}', 'App\Http\Controllers\PacienteController@getDetallesTurno')->name('detalles_turno')->middleware(['auth']);
Route::get('pacientes', 'App\Http\Controllers\PacienteController@show')->name('pacientes')->middleware(['auth']);
Route::get('pacientes/create', 'App\Http\Controllers\PacienteController@create')->name('paciente_create')->middleware(['auth']);
Route::get('pacientes/edit/{dni}', 'App\Http\Controllers\PacienteController@edit')->name('paciente_edit')->middleware(['auth']);
Route::post('turnosDePaciente', 'App\Http\Controllers\PacienteController@getTurnosPaciente')->name('get_turnos_paciente')->middleware(['auth']);
Route::post('pacientes/delete/{dni}', 'App\Http\Controllers\PacienteController@destroy')->name('paciente_delete')->middleware(['auth']);
Route::post('paciente/store', 'App\Http\Controllers\PacienteController@store')->name('paciente_store')->middleware(['auth']);
Route::post('pacientes/update/{dni}', 'App\Http\Controllers\PacienteController@update')->name('paciente_update')->middleware(['auth']);


Route::get('volver_a_turnos', function () {return redirect()->route('turnos_de_paciente');})->name('volver')->middleware(['auth']);

require __DIR__ . '/auth.php';
