<?php
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;


	// L I B R O  R I E S G O S  S O C I A L E S
		Route::get('/listado-libroriesgos-sociales', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'listadolibriesgos'])->name('libro.listadolibroriesgos');
		Route::get('/riesgos-sociales/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgosocialid'])->name('libro.riesgosocialid');
		Route::get('/crear-riesgo-social/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'crearriesgosocial'])->name('libro.crearriesgosocial');
		Route::post('/guardar-riesgo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'guardarriesgosocial'])->name('libro.guardarriesgosocial');
		Route::get('/editar-riesgo-social/{alcance}/{id}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editarriesgosocial'])->name('libro.editarriesgosocial');
		Route::post('/update-riesgo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'updateriesgosocial'])->name('libro.updateriesgosocial');
		Route::post('/delete-riesgo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'deleteriesgosocial'])->name('libro.deleteriesgosocial');
		Route::get('/riesgos-sociales-inactivos/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgosocialidinactivos'])->name('libro.riesgosocialidinactivos');
		Route::post('/activar-riesgo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'activarriesgosocial'])->name('libro.activarriesgosocial');
		Route::post('/guardar-nombre-riesgo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'adnameriesgo'])->name('libro.adnameriesgo');
		Route::post('/editar-nombre-riesgo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editnameriesgo'])->name('libro.editnameriesgo');

	// L I B R O  R I E S G O S  T E C N O L O G I C O S
		Route::get('/listado-libroriesgos-tecnologicos', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'listadolibriesgostecnologicos'])->name('librotec.listadolibroriesgostec');
		Route::get('/riesgos-tecnologicos/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgotecnologicoid'])->name('librotec.riesgotecnologicoid');
		Route::get('/crear-riesgo-tecnologico/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'crearriesgotec'])->name('librotec.crearriesgotec');
		Route::post('/guardar-riesgo-tec', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'guardarriesgotecnologico'])->name('librotec.guardarriesgotecnologico');
		Route::get('/editar-riesgo-tecnologico/{alcance}/{id}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editarriesgotecnologico'])->name('librotec.editarriesgotecnologico');
		Route::post('/update-riesgo-tec', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'updateriesgotecnologico'])->name('librotec.updateriesgotecnologico');
		Route::post('/delete-riesgo-tec', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'deleteriesgotecnologico'])->name('librotec.deleteriesgotecnologico');
		Route::get('/riesgos-tecnologicos-inactivos/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgotecnologicoidinactivos'])->name('librotec.riesgotecnologicoidinactivos');
		Route::post('/activar-riesgo-tecnologico', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'activarriesgotecnologico'])->name('librotec.activarriesgotecnologico');
		Route::post('/guardar-nombre-riesgo-tec', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'adnameriesgotec'])->name('librotec.adnameriesgotec');
		Route::post('/editar-nombre-riesgo-tec', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editnameriesgotec'])->name('librotec.editnameriesgotec');

	// L I B R O  R I E S G O S  N A T U R A L E S
		Route::get('/listado-libroriesgos-naturales', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'listadolibriesgosnaturales'])->name('libronat.listadolibroriesgosnat');
		Route::get('/riesgos-naturales/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgonaturalid'])->name('libronat.riesgonaturalid');
		Route::get('/crear-riesgo-naturales/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'crearriesgonat'])->name('libronat.crearriesgonat');
		Route::post('/guardar-riesgo-natural', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'guardarriesgonatural'])->name('libronat.guardarriesgonatural');
		Route::get('/editar-riesgo-naturales/{alcance}/{id}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editarriesgonaturales'])->name('libronat.editarriesgonaturales');
		Route::post('/update-riesgo-natural', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'updateriesgonatural'])->name('libronat.updateriesgonatural');
		Route::post('/delete-riesgo-natural', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'deleteriesgonatural'])->name('libronat.deleteriesgonatural');
		Route::get('/riesgos-naturales-inactivos/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgonaturalidinactivos'])->name('libronat.riesgonaturalidinactivos');
		Route::post('/activar-riesgo-natural', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'activarriesgonatural'])->name('libronat.activarriesgonatural');
		Route::post('/guardar-nombre-riesgo-nat', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'adnameriesgonat'])->name('libronat.adnameriesgonat');
		Route::post('/editar-nombre-riesgo-nat', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editnameriesgonat'])->name('libronat.editnameriesgonat');

	// L I B R O  R I E S G O S  O T R O S
		Route::get('/listado-otros-riesgo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'listadonuevosriesgos'])->name('librootr.listadonuevosriesgos');
		Route::post('/guardar-riesgo-nuevo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'guardarnuevoriesgo'])->name('librootr.guardarnuevoriesgo');
		Route::post('/update-riesgo-nuevo', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'updatenuevoriesgo'])->name('librootr.updatenuevoriesgo');
		Route::get('/listado-libroriesgos-otros/{id}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'listadolibriesgosotros'])->name('librootr.listadolibroriesgosotros');
		Route::get('/otros-riesgos/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgootroid'])->name('librootr.riesgootroid');
		Route::get('/crear-otro-riesgo/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'crearriesgootro'])->name('librootr.crearriesgootro');
		Route::post('/guardar-riesgo-otro', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'guardarriesgootro'])->name('librootr.guardarriesgootro');
		Route::get('/editar-otro-riesgo/{alcance}/{id}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editarriesgootro'])->name('librootr.editarriesgootro');
		Route::post('/update-riesgo-otro', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'updateriesgootro'])->name('librootr.updateriesgootro');
		Route::post('/delete-riesgo-otro', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'deleteriesgootro'])->name('librootr.deleteriesgootro');
		Route::get('/otros-riesgos-inactivos/{alcance}', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'riesgootrosidinactivos'])->name('librootr.riesgootrosidinactivos');
		Route::post('/activar-riesgo-otros', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'activarriesgootros'])->name('librootr.activarriesgootros');

		Route::post('/guardar-nombre-riesgo-otro', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'adnameriesgootro'])->name('librootr.adnameriesgootro');
		Route::post('/editar-nombre-riesgo-otro', [App\Http\Controllers\LibroRiesgos\LibroRiesgosController::class, 'editnameriesgootro'])->name('librootr.editnameriesgootro');