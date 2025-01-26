<?php
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	//Custodio Documentos
    Route::get('/documento-custodio/{id}', [App\Http\Controllers\Archivo\ArchivoController::class, 'documentocustodio'])->name('archivo.documentocustodio');

    //Custodio Fotografia
    Route::get('/fotografia-custodio/{id}', [App\Http\Controllers\Archivo\ArchivoController::class, 'fotografiacustodio'])->name('archivo.fotografiaCustodio');
    
    //Fotografia vehiculo
    Route::get('/fotografia-vehiculo/{id}', [App\Http\Controllers\Archivo\ArchivoController::class, 'fotografiavehiculo'])->name('archivo.fotografiavehiculo');

    //Avatar Usuario
    Route::get('/avatar/{documento}', [App\Http\Controllers\Archivo\ArchivoController::class, 'documentoAvatar'])->name('archivo.documentoAvatar');

    //UnidadDocumento
    Route::get('/documento-vehiculo/{id}', [App\Http\Controllers\Archivo\ArchivoController::class, 'documentovehiculo'])->name('archivo.documentovehiculo');

    //ArmaDocumento
    Route::get('/documento-arma/{id}', [App\Http\Controllers\Archivo\ArchivoController::class, 'documentoarma'])->name('archivo.documentoarma');

     //Fotografia Arma
    Route::get('/fotografia-arma/{id}', [App\Http\Controllers\Archivo\ArchivoController::class, 'fotografiaarma'])->name('archivo.fotografiaarma');
