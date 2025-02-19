<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Automatic Deuda
Route::get('/generar-deudas-automaticas', 'AutomaticDeudaController@create')->name('automatic.create');
Route::post('/generar-deudas-automaticas', 'AutomaticDeudaController@store')->name('automatic.store');
Route::post('/generar-deudas-agua-automaticas', 'AutomaticDeudaController@save')->name('automatic.save');

Route::get('profile', 'ProfileController@edit')
            ->name('profile.edit');

Route::put('profile', 'ProfileController@update')
            ->name('profile.update');

Route::resource('users', 'UserController');
Route::resource('ubicaciones', 'UbicacionController')->except('show');
Route::resource('actividades', 'ActividadController')->except('show');
Route::resource('conductores', 'ComercianteController')->only('index');
Route::resource('puestos', 'PuestoController');
// Route::get('puestos-deudas-agua', 'PuestoDeudaAguaController@index')->name('puesto.deuda.agua');

// Para Control
Route::resource('pagos', 'PagoController');
Route::resource('deudas', 'DeudaController')->only('edit', 'update');
Route::resource('pagosanticipados', 'PagoAnticipadoControlController')->only('edit', 'update');

Route::resource('puestos.pagos', 'PuestoPagoController')->only(['index', 'create', 'store']);
Route::resource('puestos.deudas', 'PuestoDeudaController')->only(['index', 'create', 'store', 'destroy']);
Route::resource('puestos.tramites', 'PuestoTramiteController')->only(['create', 'store']);
Route::resource('puestos.servicios', 'PuestoServicioController')->only(['create', 'store']);

Route::get('puestos/{puesto}/servicios/deuda', 'PuestoServicioController@deuda')->name('servicio.deuda');
Route::post('puestos/{puesto}/sdfsdf', 'PuestoServicioController@save')->name('puestos.servicios.save');

Route::resource('puestos.pagoanticipados', 'PagoAnticipadoController')->only(['index', 'create', 'store']);
Route::resource('puestos.aguaanticipados', 'AguaAnticipadoController')->only(['index', 'create', 'store']);

// Charts
Route::get('dashboard-sisa', 'Dashboard\dashboardChartController@index')->name('dashboard');
Route::get('dashboard-servicios-higienicos', 'Dashboard\banioChartController@index')->name('dashboard.banio');
Route::get('dashboard-promociones', 'Dashboard\PromocionChartController@index')->name('dashboard.promocion');
Route::get('dashboard-general', 'Dashboard\GeneralChartController@index')->name('dashboard.general');

// Promociones
Route::resource('promociones', 'PromocionController');

// Talonarios
Route::resource('talonarios', 'TalonarioController')->except('show');

// Search
Route::get('/buscar', 'Search\SearchComerciante@search')->name('comerciante.search');
Route::get('/buscar-puesto', 'Search\PuestoSearchController@search')->name('puestos.search');
Route::get('/buscar-conductor', 'Search\ConductorSearchController@search')->name('conductores.search');
Route::get('/buscar-users', 'Search\UserSearchController@search')->name('users.search');
Route::get('/buscar-promociones', 'Search\PromocionSearchController@search')->name('promociones.search');
Route::get('/buscar-banios', 'Search\BanioSearchController@search')->name('banio.search');
// Search Control
Route::get('/buscar-pagos-sisa-control', 'Search\SearchPagoSisa@search')->name('pago.sisa.search');
Route::get('/buscar-deudas-sisa', 'Search\SearchDeudaSisa@search')->name('deuda.sisa.search');

Route::get('/buscar-pagos-sisa', 'Search\SearchPagoAnticipadoControlSisa@search')->name('pagoanticipado.sisa.search');
Route::get('/buscar-deuda-sisa-personal', 'Search\SearchDeudaSisaPersonal@search')->name('deuda.personal');
Route::get('/buscars-deudas-sisas-personales', 'Search\SearchDeudaSisaPersonal@destroy')->name('deuda.personal.destroy');

Route::get('/buscar-pagosanticipados-sisa', 'Search\SearchPagoAnticipadoControlSisa@search')->name('pagoanticipado.sisa.search');


// Pago Sisa Control - Index [Control]
Route::get('/pagos-sisa', 'Search\SearchPagoSisa@index')->name('pago.sisa.index');
Route::get('/deudas-sisa', 'Search\SearchDeudaSisa@index')->name('deuda.sisa.index');
Route::get('/pagos-anticipados-sisa', 'Search\SearchPagoAnticipadoControlSisa@index')->name('pagoanticipado.sisa.index');

// Export
Route::get('puestos-excel', 'Export\PuestoExportController@excel')->name('puestos.excel');
Route::get('puestos-pdf', 'Export\PuestoExportController@pdf')->name('puestos.pdf');
Route::get('conductores-excel', 'Export\ComercianteExportController@excel')->name('conductores.excel');
Route::get('conductores-pdf', 'Export\ComercianteExportController@pdf')->name('conductores.pdf');
Route::get('users-excel', 'Export\UserExportController@excel')->name('users.excel');
Route::get('users-pdf', 'Export\UserExportController@pdf')->name('users.pdf');
Route::get('deudas-excel/{id}', 'Export\DeudaExportController@excel')->name('deudas.excel');
Route::get('deudas-pdf/{id}', 'Export\DeudaExportController@pdf')->name('deudas.pdf');
Route::get('promociones-excel', 'Export\PromocionExportController@excel')->name('promociones.excel');
Route::get('promociones-pdf', 'Export\PromocionExportController@pdf')->name('promociones.pdf');

// N. Operaciones
Route::get('operaciones', 'Operacion\OperacionController@create')->name('operaciones.create');
Route::get('num-operacion-banios', 'Operacion\OperacionBanioController@create')->name('operacion.banio.create');
Route::post('operacionbanios', 'Operacion\OperacionBanioController@store')->name('operacion.banio.store');
Route::get('num-operacion-promociones', 'Operacion\OperacionPromocionController@create')->name('operacion.promocion.create');
Route::post('operacionpromociones', 'Operacion\OperacionPromocionController@store')->name('operacion.promocion.store');

// Baños
Route::resource('banios', 'BanioController')->except(['show']);
Route::get('banioduchas', 'BanioDuchaController@create')->name('banio.ducha.create');
Route::post('banioduchas', 'BanioDuchaController@store')->name('banio.ducha.store');

// Reporte Sisa
Route::get('generar-reportes', 'Reporte\ReporteDeudaController@index')->name('reporte.index');
Route::get('reporte-deudas', 'Reporte\ReporteDeudaController@deuda')->name('reporte.deuda');
Route::get('reporte-pagos', 'Reporte\ReporteDeudaController@pago')->name('reporte.pago');
Route::get('reporte-sisas', 'Reporte\ReporteDeudaController@sisa')->name('reporte.sisa');
Route::get('reporte-sisa-mes', 'Reporte\ReporteDeudaController@sisaMonth')->name('reporte.sisa.mes');
Route::get('reporte-tramites', 'Reporte\ReporteDeudaController@tramite')->name('reporte.tramite');

// Reporte Baño
Route::get('reporte-banios', 'Reporte\ReporteBanioController@index')->name('reporte.banio.index');
Route::get('reporte-banios-mes', 'Reporte\ReporteBanioController@month')->name('reporte.banio.month');
Route::get('reporte-banios-dia', 'Reporte\ReporteBanioController@day')->name('reporte.banio.day');

// Reporte Promociones
Route::get('reporte-promociones', 'Reporte\ReportePromocionController@index')->name('reporte.promocion.index');
Route::get('reporte-promociones-mes', 'Reporte\ReportePromocionController@month')->name('reporte.promocion.month'); // Genera Reportes por DIA y MES

// Mis Deudas - Comerciante
Route::get('mis-deudas-sisa', 'Debts\MyDebtsController@index')->name('my-debts');
Route::get('mis-deudas-agua', 'Debts\MyDebtsAguaController@index')->name('my-debts-agua');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
