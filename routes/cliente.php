<?php
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	//  C L I E N T E
		Route::get('/listado-cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'listadocliente'])->name('cliente.listadocliente');
		Route::post('/clientes-datatable', [App\Http\Controllers\Cliente\ClienteController::class, 'clientelistadodatatable'])->name('cliente.clientelistadodatatable');
		Route::get('/agregar-cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'agregarcliente'])->name('cliente.agregarcliente');
		Route::post('/guardar-cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'guardarcliente'])->name('cliente.guardarcliente'); 
		Route::get('/editar-cliente/{cliente}', [App\Http\Controllers\Cliente\ClienteController::class, 'editarcliente'])->name('cliente.editarcliente');
		Route::post('/eliminar-contacto-operativo', [App\Http\Controllers\Cliente\ClienteController::class, 'eliminarcontactooperativo'])->name('cliente.eliminarcontactooperativo');
		Route::post('/eliminar-contacto-facturacion', [App\Http\Controllers\Cliente\ClienteController::class, 'eliminarcontactofacturacion'])->name('cliente.eliminarcontactofacturacion');
		Route::post('/update-cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'updatecliente'])->name('cliente.updatecliente'); 
		Route::post('/desactivar-cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'desactivarcliente'])->name('cliente.desactivarcliente');
		Route::get('/listado-clientes-inactivos', [App\Http\Controllers\Cliente\ClienteController::class, 'listadoclienteinactivo'])->name('cliente.listadoclienteinactivo');
		Route::post('/activar-cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'activarcliente'])->name('cliente.activarcliente');
		Route::get('/ver-cliente/{cliente}', [App\Http\Controllers\Cliente\ClienteController::class, 'vercliente'])->name('cliente.vercliente');
		Route::get('/nuevo-cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'nuevocliente'])->name('cliente.nuevocliente');
		Route::post('/guardar-clientenuevo', [App\Http\Controllers\Cliente\ClienteController::class, 'guardarclientenuevo'])->name('cliente.guardarclientenuevo');

	//  C L I E N T E
		//Analisis Social
		Route::get('/listado-analisis-riesgos', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'listadoanalisis'])->name('analisis.listadoanalisis');
		Route::get('/analisis-riesgos-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'analisiscliente'])->name('analisis.analisiscliente');
		Route::get('/seleccionar-analisis-riesgos/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'seleccionaanalisis'])->name('analisis.seleccionaanalisis');
		Route::get('/generar-analisis-riesgos/{cliente}/{tipo}/{alcance}/{num}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'generaranalisis'])->name('analisis.generaranalisis');
		Route::post('/obtener-alcances', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'obteneralcances'])->name('analisis.obteneralcances');
		Route::post('/guardar-riesgo', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'guardarriesgo'])->name('analisis.guardarriesgo');	
		Route::post('/actualizar-riesgo', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'actualizarriesgo'])->name('analisis.actualizarriesgo');

		Route::get('/graficas-riesgos-sociales-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'graficassociales'])->name('analisis.graficassociales');
		Route::get('/documento-ejecutivo-riesgos/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'documentoejecutivo'])->name('analisis.documentoejecutivo');
		Route::get('/descargar-documento-ejecutivo-riesgos/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'descargardocumentoejecutivo'])->name('analisis.descargardocumentoejecutivo');		
		Route::get('/detalle-analisis-riesgo/{cliente}/{id}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'detalleanalisissocial'])->name('analisis.detalleanalisissocial');
		Route::get('/editar-analisis-riesgo/{cliente}/{id}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'analisisanalisissocial'])->name('analisis.analisisanalisissocial');
		Route::post('/desactivar-analisis', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'eliminarAnalisis'])->name('analisis.eliminarAnalisis');

		//Analisis Tecnologicos
		Route::get('/analisis-riesgos-tecnologicos-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'analisistecnologicoscli'])->name('analisis.analisistecnologicoscli');
		Route::get('/seleccionar-analisis-riesgos-tec/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'seleccionaanalisistec'])->name('analisis.seleccionaanalisistec');
		Route::get('/generar-analisis-riesgos-tecnologico/{cliente}/{tipo}/{alcance}/{num}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'generaranalisistecno'])->name('analisis.generaranalisistecno');
		Route::post('/obtener-alcances-tecnologicos', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'obteneralcancestecnologicos'])->name('analisis.obteneralcancestecnologicos');
		Route::post('/guardar-riesgo-tecnologicos', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'guardarriesgotecnologico'])->name('analisis.guardarriesgotecnologico');
		Route::get('/graficas-riesgos-tecnologicos-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'graficastecnologicas'])->name('analisis.graficastecnologicas');	

		//Analisis Naturales
		Route::get('/analisis-riesgos-naturales-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'analisisnaturalescli'])->name('analisis.analisisnaturalescli');
		Route::get('/seleccionar-analisis-riesgos-naturales/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'seleccionaanalisisnaturales'])->name('analisis.seleccionaanalisisnaturales');
		Route::get('/generar-analisis-riesgos-naturales/{cliente}/{tipo}/{alcance}/{num}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'generaranalisisnaturales'])->name('analisis.generaranalisisnaturales');
		Route::post('/obtener-alcances-naturales', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'obteneralcancesnaturales'])->name('analisis.obteneralcancesnaturales');
		Route::post('/guardar-riesgo-naturales', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'guardarriesgonaturales'])->name('analisis.guardarriesgonaturales');
		Route::get('/graficas-riesgos-naturales-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'graficasnaturales'])->name('analisis.graficasnaturales');	

		//Analisis Otros
		Route::get('/analisis-otros-riesgos-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'analisisotroscli'])->name('analisis.analisisotroscli');
		Route::get('/seleccionar-analisis-riesgos-otros/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'seleccionaanalisisotros'])->name('analisis.seleccionaanalisisotros');
		Route::get('/generar-analisis-otros-riesgos/{cliente}/{tipo}/{alcance}/{num}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'generaranalisisotros'])->name('analisis.generaranalisisotros');
		Route::post('/obtener-alcances-otros', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'obteneralcancesotros'])->name('analisis.obteneralcancesotros');
		Route::post('/guardar-riesgo-otros', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'guardarriesgootros'])->name('analisis.guardarriesgootros');
		Route::get('/graficas-otros-riesgos-cliente/{cliente}', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'graficasotros'])->name('analisis.graficasotros');	

		// Matriz de Aceptibilidad
		Route::get('/matriz-aceptabilidad', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'matriz'])->name('analisis.matrizaceptabilidad');

		Route::get('/metodos', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'metodos'])->name('analisis.metodos');
		Route::get('/riesgoperfil', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'riesgoperfil'])->name('analisis.riesgos');
		Route::get('/kpis', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'kpis'])->name('analisis.kpis');	


		// PruebaDiego-Futbol
		Route::get('/diegofut', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'diegofut'])->name('analisis.diegofut');
		Route::get('/diegores', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'diegores'])->name('analisis.diegores');

		//Actiualizar tabla

		Route::post('/update-cell', [App\Http\Controllers\Cliente\AnalisisRiesgosController::class, 'updateCell'])->name('analisis.updateCell');