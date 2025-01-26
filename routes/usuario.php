<?php  
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	// Listado de Usuarios
		Route::get('/catalogo-usuarios', [App\Http\Controllers\UsuarioController::class, 'catalogousuarios'])->name('user.catalogousuarios')->middleware('permission:usuario-list');
		Route::post('/usuarios-datatables', [App\Http\Controllers\UsuarioController::class, 'usuariosdatatable'])->name('user.usuariosdatatable');
		Route::get('/agregar-usuario', [App\Http\Controllers\UsuarioController::class, 'agregarusuario'])->name('user.agregarusuario');
		Route::post('/guardar-usuario', [App\Http\Controllers\UsuarioController::class, 'guardarusuario'])->name('user.guardarusuario')->middleware('permission:usuario-create'); 
		Route::get('/editar-usuario/{usuario}', [App\Http\Controllers\UsuarioController::class, 'editarusuario'])->name('user.editarusuario')->middleware('permission:usuario-edit'); 
		Route::post('/modificar-usuario', [App\Http\Controllers\UsuarioController::class, 'modificarusuario'])->name('user.modificarusuario')->middleware('permission:usuario-edit');
		Route::post('/desactivar-usuario', [App\Http\Controllers\UsuarioController::class, 'desacticarusuario'])->name('user.desacticarusuario')->middleware('permission:usuario-delete');
		Route::get('/catalogo-usuarios-inactivos', [App\Http\Controllers\UsuarioController::class, 'catalogousuariosinactivos'])->name('user.usuariosinactivos')->middleware('permission:usuario-delete');
		Route::post('/activar-usuario', [App\Http\Controllers\UsuarioController::class, 'activarusuario'])->name('user.activarusuario')->middleware('permission:usuario-delete');
		Route::get('/ver-usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'verUsuario'])->name('user.verusuario');
		Route::get('/error-permiso', [App\Http\Controllers\UsuarioController::class, 'errorpermiso'])->name('user.errorpermiso');

	// Listado de Roles
		Route::get('/catalogo-roles', [App\Http\Controllers\UsuarioController::class, 'catalogoroles'])->name('rol.catalogoroles')->middleware('permission:role-list');
		Route::post('/roles-datatable', [App\Http\Controllers\UsuarioController::class, 'rolesdatatable'])->name('rol.rolesdatatable');
		Route::get('/agregar-rol', [App\Http\Controllers\UsuarioController::class, 'agregarrol'])->name('rol.agregarrol')->middleware('permission:role-create');
		Route::post('/guardar-rol', [App\Http\Controllers\UsuarioController::class, 'guardarrol'])->name('rol.guardarrol')->middleware('permission:role-create');
		Route::get('/modificar-rol/{rol}', [App\Http\Controllers\UsuarioController::class, 'modificarrol'])->name('rol.modificarrol')->middleware('permission:role-edit');
		Route::post('/editar-rol', [App\Http\Controllers\UsuarioController::class, 'editarrol'])->name('rol.editarrol')->middleware('permission:role-edit');
		Route::post('/desactivar-rol', [App\Http\Controllers\UsuarioController::class, 'desacticarrol'])->name('rol.desacticarrol')->middleware('permission:role-delete');
		Route::get('/catalogo-roles-inactivos', [App\Http\Controllers\UsuarioController::class, 'catalogorolesinactivos'])->name('rol.rolesinactivos')->middleware('permission:role-delete');
		Route::post('/activar-rol', [App\Http\Controllers\UsuarioController::class, 'activarrol'])->name('rol.activarrol')->middleware('permission:role-delete');