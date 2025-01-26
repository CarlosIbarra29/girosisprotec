<?php  
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	// Perfil de usuario
	Route::get('/informacion', [App\Http\Controllers\Perfil\PerfilController::class, 'perfilUsuario'])->name('perfil.informacion');
	Route::post('/actualizar-informacion', [App\Http\Controllers\Perfil\PerfilController::class, 'perfilActualizarInformacion'])->name('perfil.actualizarinformacion');