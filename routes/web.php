<?php

use App\Livewire\Actualizar\ActualizarSalario;
use App\Livewire\Afiliados\AfiliadosIndex;
use App\Livewire\Afiliados\CreateAfiliado;
use App\Livewire\Afiliados\EditAfiliado;
use App\Livewire\Afiliados\VerAfiliado;
use App\Livewire\Afps\Afp;
use App\Livewire\Afps\CreateAfp;
use App\Livewire\Afps\EditAfp;
use App\Livewire\Arls\Arl;
use App\Livewire\Arls\CreateArl;
use App\Livewire\Arls\EditArl;
use App\Livewire\Cajas\Caja;
use App\Livewire\Cajas\CreateCaja;
use App\Livewire\Cajas\EditCaja;
use App\Livewire\Empresa\CreateEmpresa;
use App\Livewire\Empresa\Empresa;
use App\Livewire\Empresa\EmpresaIndex;
use App\Livewire\Empresa\EmpresaShow;
use App\Livewire\Epss\CreateEps;
use App\Livewire\Epss\EditEps;
use App\Livewire\Epss\Eps;
use App\Livewire\Movimentos\CierreAño;
use App\Livewire\Movimentos\CierreDiario;
use App\Livewire\Movimentos\CierreTotalesAño;
use App\Livewire\Movimentos\CreateIngresosEgreso;
use App\Livewire\Movimentos\IngresosEgresos;
use App\Livewire\Movimentos\IngresosEgresosIndex;
use App\Livewire\Pagos\CreatePagos;
use App\Livewire\Pagos\PagosIndex;
use App\Livewire\Planillas\CreatePlanillaRetiros;
use App\Livewire\Planillas\CreatePlanillas;
use App\Livewire\Planillas\GenerarPlanillas;
use App\Livewire\Planillas\PlanillaRetiros;
use App\Livewire\Planillas\PlanillasIndex;
use App\Livewire\Retiros\RetirosIndex;
use App\Livewire\Roles\CreateRol;
use App\Livewire\Roles\EditRoles;
use App\Livewire\Roles\RolesIndex;
use App\Livewire\User\CreateUser;
use App\Livewire\User\EditUser;
use App\Livewire\User\UserIndex;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Spatie\Permission\Commands\CreateRole;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('Empresa/Modificar/{empresaId}', Empresa::class)->name('Empresa.Modificar');
    Route::get('Empresa/Index', EmpresaIndex::class)->name('Empresa.Index');
    Route::get('Empresa/Create', CreateEmpresa::class)->name('Empresa.Create');
    Route::get('Empresa/Show/{empresaId}', EmpresaShow::class)->name('Empresa.Show');

    
    Route::get('Admin/Users', UserIndex::class)->name('Admin.Users');
    Route::get('Admin/Users/Create', CreateUser::class)->name('Admin.Users.Create');
    Route::get('Admin/Users/Edit/{userid}', EditUser::class)->name('Admin.Users.Edit');

    Route::get('Admin/Roles', RolesIndex::class)->name('Admin.Roles');
    Route::get('Admin/Roles/Create', CreateRol::class)->name('Admin.Roles.Create');
    Route::get('Admin/Roles/Edit/{roleId}', EditRoles::class)->name('Admin.Roles.Edit');

    Route::get('Afiliados', AfiliadosIndex::class)->name('Afiliados');
    Route::get('Afiliados/Create', CreateAfiliado::class)->name('Afiliados.Create');
    Route::get('Afiliados/Edit/{afiliadoId}', EditAfiliado::class)->name('Afiliados.Edit');
    Route::get('Afiliados/Show/{afiliadoId}', VerAfiliado::class)->name('Afiliados.Show');

    Route::get('Arls/Arls', Arl::class)->name('Arls.Arls');
    Route::get('Arls/Arls/Create', CreateArl::class)->name('Arls.Arls.Create');
    Route::get('Arls/Arls/Edit/{arlid}', EditArl::class)->name('Arls.Arls.Edit');

    Route::get('Afps/Afps', Afp::class)->name('Afps.Afps');
    Route::get('Afps/Afps/Create', CreateAfp::class)->name('Afps.Afps.Create');
    Route::get('Afps/Afps/Edit/{afpid}', EditAfp::class)->name('Afps.Afps.Edit');

    Route::get('Cajas/Cajas', Caja::class)->name('Cajas.Cajas');
    Route::get('Cajas/Cajas/Create', CreateCaja::class)->name('Cajas.Cajas.Create');
    Route::get('Cajas/Cajas/Edit/{cajaid}', EditCaja::class)->name('Cajas.Cajas.Edit');

    Route::get('Eps/Eps', Eps::class)->name('Eps.Eps');
    Route::get('Eps/Eps/Create', CreateEps::class)->name('Eps.Eps.Create');
    Route::get('Eps/Eps/Edit/{epsid}', EditEps::class)->name('Eps.Eps.Edit');

    Route::get('Pagos/Pagos', PagosIndex::class)->name('Pagos.Pagos');
    Route::get('Pagos/Pagos/Create', CreatePagos::class)->name('Pagos.Pagos.Create');
   // Route::get('Pagos/Pagos/Edit/{pagosId}', EditPagos::class)->name('Pagos.Pagos.Edit');

   Route::get('Planillas/Planillas', PlanillasIndex::class)->name('Planillas.Planillas');
   Route::get('Planillas/Create', CreatePlanillas::class)->name('Planillas.Create');
   Route::get('Planillas/Create/Index', PlanillaRetiros::class)->name('Planillas.Create.Index');
   Route::get('Planillas/Create/Retiro', CreatePlanillaRetiros::class)->name('Planillas.Create.Retiro');
   Route::get('Planillas/Generar', GenerarPlanillas::class)->name('Planillas.Generar');

   Route::get('Retiros/Retiros', RetirosIndex::class)->name('Retiros.Retiros');
   Route::get('Actualizar/Salario', ActualizarSalario::class)->name('Actualizar.Salario');

   Route::get('Movimiento/IngresosEgresos', IngresosEgresos::class)->name('Movimiento.IngresosEgresos');
   Route::get('Movimiento/CreateIngresosEgresos', CreateIngresosEgreso::class)->name('Movimiento.CreateIngresosEgresos');
   Route::get('Movimiento/IngresosEgresosIndex', IngresosEgresosIndex::class)->name('Movimiento.IngresosEgresosIndex');
   Route::get('Movimiento/CirerreDiario', CierreDiario::class)->name('Movimiento.CirerreDiario');
   Route::get('Movimiento/CirerreAño', CierreTotalesAño::class)->name('Movimiento.CirerreAño');

//PDF Report Route
    Route::get('Reports/Users', [App\Http\Controllers\ReportController::class, 'UserReports'])->name('Reports.Users');
    Route::get('Reports/Afiliados', [App\Http\Controllers\ReportController::class, 'AfiliadosReports'])->name('Reports.Afiliados');
    Route::get('Reports/Pagos', [App\Http\Controllers\ReportController::class, 'PagosReports'])->name('Reports.Pagos');
    Route::get('Reports/Pagos/Recibo{id}', [App\Http\Controllers\ReportController::class, 'ReciboPago'])->name('Reports.Pagos.Recibo');
    Route::get('Reports/IngresosEgresos/Año{id}', [App\Http\Controllers\ReportController::class, 'ReportsIngresosEgresosAño'])->name('Reports.IngresosEgresos.Año');
    Route::get('Reports/IngresosEgresos/Mes/{fecha_inicio}/{fecha_fin}', [App\Http\Controllers\ReportController::class, 'IngresosEgresosMes'])->name('Reports.IngresosEgresos.Mes')
                ->where(['fecha_inicio' => '[0-9\-]+', 'fecha_fin'    => '[0-9\-]+']);
    Route::get('Reports/IngresosEgresos/Dia/{fecha_inicio}/{fecha_fin}', [App\Http\Controllers\ReportController::class, 'IngresosEgresosDia'])->name('Reports.IngresosEgresos.Dia');
    Route::get('Reports/Afiliados/SinPago', [App\Http\Controllers\ReportController::class, 'PendientesPago'])->name('Reports.Afiliados.SinPago');

//Excel Export Route
    Route::get('Export/Users', [UserIndex::class, 'ExportAllUser'])->name('Export.Users');
    Route::get('Export/Afiliados', [AfiliadosIndex::class, 'ExportAllAfiliados'])->name('Export.Afiliados');
    Route::get('Export/Pagos', [PagosIndex::class, 'ExportAllPagos'])->name('Export.Pagos');
    Route::get('Export/PlanillasA', [PlanillasIndex::class, 'ExpotPlanillasAportes'])->name('Export.PlanillasA');
    Route::get('Export/PlanillasS', [PlanillasIndex::class, 'ExpotPlanillasSimple'])->name('Export.PlanillasS');


//CSV Export Route
    Route::get('Export/UsersCsv', [UserIndex::class, 'ExportAllUserCsv'])->name('Export.UsersCsv');
    Route::get('Export/AfiliadosCsv', [AfiliadosIndex::class, 'ExportAllAfiliadosCsv'])->name('Export.AfiliadosCsv');
    Route::get('Export/PagosCsv', [PagosIndex::class, 'ExportAllPagosCsv'])->name('Export.PagosCsv');

});

require __DIR__.'/auth.php';
