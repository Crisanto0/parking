<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PropietarioController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/', [AuthController::class, 'login']);

Route::get('/inicio', [InicioController::class, 'inicio'])->name('inicio')->middleware('role:1,2');


Route::resource('anuncios', AnuncioController::class);


route::get('/anuncios',function(){
    return view('anuncios');
})->name('anuncios');

Route::resource('anuncios', AnuncioController::class);

// Ruta para mostrar el formulario
Route::get('/registrarempleado', function(){
    return view('registrarempleado');
})->name('registrarempleado');

// Ruta para procesar el formulario (manejar la solicitud POST)
Route::post('/registrarempleado', [EmpleadoController::class, 'store'])->name('registrarempleado');



Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "Conexión establecida exitosamente a la base de datos " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "No se pudo conectar a la base de datos. Por favor, verifica tu configuración. Error:" . $e;
    }
});

Route::get('/consultas', [UsuarioController::class, 'mostrarUsuarios']);
Route::post('/consultas', [UsuarioController::class, 'store']);
Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/registrarclientes', function(){return view('registrarclientes');})->name('registrarclientes');
Route::post('/registrarclientes',[PropietarioController::class, 'store'])->name('registrarclientes');



Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/empleados/{usuario_id}', [EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/{usuario_id}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{usuario_id}', [EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/{usuario_id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

Route::get('/buscar_empleados', [EmpleadoController::class, 'index'])->name('buscar_empleados.index');
Route::get('empleados/{usuario_id}/changeStatus', [EmpleadoController::class, 'changeStatus'])->name('empleados.changeStatus');
Route::get('/empleados/{usuario_id}/perfil', [EmpleadoController::class, 'showProfile'])->name('empleados.profile');
Route::get('/empleados/{usuario_id}/perfil/editar', [EmpleadoController::class, 'editProfile'])->name('empleados.editProfile');
Route::post('/empleados/{usuario_id}/perfil/actualizar', [EmpleadoController::class, 'updateProfile'])->name('empleados.updateProfile');
Route::post('/empleados/{usuario_id}/perfil/cambiar-contrasena', [EmpleadoController::class, 'changePassword'])->name('empleados.changePassword');
Route::get('empleados/{usuario_id}/cambiar-contraseña', [EmpleadoController::class, 'showChangePasswordForm'])->name('empleados.changePasswordForm');

Route::get('password/verify', [EmpleadoController::class, 'showPasswordResetForm'])->name('password.verify');
Route::post('password/verify', [EmpleadoController::class, 'verifySecurityWord']);
Route::get('password/change/{usuario_id}', [EmpleadoController::class, 'showChangePasswordForm1'])->name('password.change');
Route::post('password/change/{usuario_id}', [EmpleadoController::class, 'changePassword1']);



// Ruta para listar todos los propietarios
Route::get('/propietarios', [PropietarioController::class, 'index'])->name('propietarios.index');

// Ruta para mostrar detalles de un propietario y su vehículo
Route::get('/propietarios/{propietario_id}', [PropietarioController::class, 'show'])->name('propietarios.show');

// Ruta para mostrar el formulario de edición de un propietario y su vehículo
Route::get('/propietarios/{propietario_id}/edit', [PropietarioController::class, 'edit'])->name('propietarios.edit');


// Ruta para actualizar los datos de un propietario y su vehículo
Route::put('/propietarios/{propietario_id}', [PropietarioController::class, 'update'])->name('propietarios.update');

Route::delete('propietarios/{propietario_id}', [PropietarioController::class, 'destroy'])->name('propietarios.destroy');

use App\Http\Controllers\ParkingController;

Route::get('/parking', [ParkingController::class, 'index'])->name('parking.index');
Route::post('/parking/assign', [ParkingController::class, 'assign'])->name('parking.assign');
Route::patch('/parking/unassign/{garaje_id}', [ParkingController::class, 'unassign'])->name('parking.unassign');
Route::get('parking/invoice/{no_factura}', [ParkingController::class, 'showInvoice'])->name('parking.invoice');
Route::get('/parking/create', [ParkingController::class, 'create'])->name('parking.create');
Route::post('/parking/store', [ParkingController::class, 'store'])->name('parking.store');
Route::get('/parking/search', [ParkingController::class, 'search'])->name('parking.search');
Route::get('/parking/{garaje_id}', [ParkingController::class, 'show'])->name('parking.show');
Route::get('/parking/{no_factura}/pdf', [ParkingController::class, 'downloadInvoicePdf'])->name('parking.pdf');
Route::get('/parking/pdf/{no_factura}', [ParkingController::class, 'printInvoice'])->name('parking.pdf');
Route::get('/facturas', [ParkingController::class, 'facturasIndex'])->name('facturas.index');
Route::get('/facturas/reporte', [ParkingController::class, 'downloadReportPdf'])->name('facturas.reporte');
Route::get('/manage-zones', [ParkingController::class, 'manageZones'])->name('parking.manage_zones');
Route::post('/parking/block/{id_garaje}', [ParkingController::class, 'block'])->name('parking.block');
Route::post('/parking/activate/{id_garaje}', [ParkingController::class, 'activate'])->name('parking.activate');
Route::delete('/parking/delete/{id_garaje}', [ParkingController::class, 'delete'])->name('parking.delete');
// Ruta para mostrar el formulario de edición
Route::get('parking/{id_garaje}/edit', [ParkingController::class, 'edit'])->name('parking.edit');

// Ruta para actualizar la zona de parqueo
Route::put('parking/{id_garaje}', [ParkingController::class, 'update'])->name('parking.update');
Route::get('/generar-ticket/{id_garaje}', [ParkingController::class, 'generarTicket'])->name('generar.ticket');



