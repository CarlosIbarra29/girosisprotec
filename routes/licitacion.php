<?php
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	// A R E A  P E R S O N A L
		Route::get('/listado-area', [App\Http\Controllers\Licitacion\AreaController::class, 'listadoarea'])->name('area.listadoarea');
		Route::post('/area-datatable', [App\Http\Controllers\Licitacion\AreaController::class, 'areadatatable'])->name('area.areadatatable');
		Route::post('/guardar-area', [App\Http\Controllers\Licitacion\AreaController::class, 'guardararea'])->name('area.guardararea');
		Route::post('/editar-area', [App\Http\Controllers\Licitacion\AreaController::class, 'editararea'])->name('area.editararea');
		Route::post('/desactivar-area', [App\Http\Controllers\Licitacion\AreaController::class, 'desactivararea'])->name('area.desactivararea');
		Route::get('/catalogo-area-inactivos', [App\Http\Controllers\Licitacion\AreaController::class, 'catalogoareainactivas'])->name('area.catalogoareainactivas');
		Route::post('/activar-area', [App\Http\Controllers\Licitacion\AreaController::class, 'activararea'])->name('area.activararea');

