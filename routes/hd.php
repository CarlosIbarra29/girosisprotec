<?php
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	// N I V E L   D E  C O N T R O L
    	Route::get('/catalogo-nivelcontrol', [App\Http\Controllers\Hd\NivelControlController::class, 'catalogonivelcontrol'])->name('hd.catalogonivelcontrol');
    	Route::post('/nivelcontrol-datatable', [App\Http\Controllers\Hd\NivelControlController::class, 'nivelcontroldatatable'])->name('hd.nivelcontroldatatable');
    	Route::post('/guardar-nivelcontrol', [App\Http\Controllers\Hd\NivelControlController::class, 'guardarNivelcontrol'])->name('hd.guardarNivelcontrol');
    	Route::post('/editar-nivelcontrol', [App\Http\Controllers\Hd\NivelControlController::class, 'editarNicelcontrol'])->name('hd.editarNicelcontrol');
    	Route::post('/desactivar-nivelcontrol', [App\Http\Controllers\Hd\NivelControlController::class, 'eliminarNivelcontrol'])->name('hd.eliminarNivelcontrol');
    	Route::get('/catalogo-nivelcontrol-inactivos', [App\Http\Controllers\Hd\NivelControlController::class, 'catalogonivelcontrolinactivos'])->name('hd.nivelcontrolinactivos');
    	Route::post('/activar-nivelcontrol', [App\Http\Controllers\Hd\NivelControlController::class, 'activarnivelcontrol'])->name('hd.activarnivelcontrol');