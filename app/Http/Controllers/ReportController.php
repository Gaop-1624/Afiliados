<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Afiliado;
use App\Models\IngresosEgresos;
use App\Models\Pagos;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public $fecha;
    public $year, $mes;
    public $monthlyTotals = [];
    public $fecha_inicio;
    public $fecha_fin;
    public $perPage = 15;
    public $sumEntradas = 0;
    public $sumSalidas = 0;
    public $afiliadosSinPago;

    public function UserReports()
    {
        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;
        $users = User::all();
        $pdf = SnappyPdf::loadView('pdf.ReportUser', compact('users', 'empresa', 'nit', 'direccion', 'telefono', 'celular'));
        return $pdf->download('UserReport.pdf');
    }

    public function AfiliadosReports()
    {
        $user = User::find(Auth::user()->id);
        $afiliados = Afiliado::where('user_id', $user->id)->get();
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;
       // $users = User::all();
        $pdf = SnappyPdf::loadView('pdf.ReportAfiliados', compact('user', 'empresa', 'nit', 'direccion', 'telefono', 'celular', 'afiliados'));
        return $pdf->download('AfiliadosReport.pdf');
    }

    public function PagosReports()
    {
        $user = User::find(Auth::user()->id);
        $pagos = Pagos::where('user_id', $user->id)->get(); // Assuming there's a relationship defined
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;
        $pdf = SnappyPdf::loadView('pdf.ReportPagos', compact('user', 'empresa', 'nit', 'direccion', 'telefono', 'celular', 'pagos'));
        return $pdf->download('PagosReport.pdf');
    }

    public function ReciboPago($id){
        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;
        $pago = Pagos::find($id);
        $pdf = SnappyPdf::loadView('Pdf.ReciboPago', compact('pago', 'empresa', 'nit', 'celular', 'telefono', 'direccion'));
        return $pdf->download('ReciboPago.pdf');
    }

    public function mount()
    {
        $this->fecha = now()->toDateString();
        $this->year = now()->year;
        $this->fecha_inicio = now()->startOfMonth()->toDateString();
        $this->fecha_fin = now()->endOfMonth()->toDateString();
       // $this->loadAfiliadosSinPago();
      
    }

    public function ReportsIngresosEgresosAño()
    {
        $this->fecha = now()->toDateString();
        $this->year = now()->year;  

        $results = DB::table('ingresos_egresos')
            ->selectRaw('MONTH(fecha_ingreso) as month, COALESCE(SUM(entrada),0) as entradas, COALESCE(SUM(salida),0) as salidas')
            ->whereYear('fecha_ingreso', $this->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $this->monthlyTotals = [];
        for ($m = 1; $m <= 12; $m++) {
            $entradas = isset($results[$m]) ? (float)$results[$m]->entradas : 0;
            $salidas  = isset($results[$m]) ? (float)$results[$m]->salidas  : 0;
            $this->monthlyTotals[$m] = [
                'month'    => $m,
                'label'    => Carbon::create($this->year, $m, 1)->Format('F'),
                'entradas' => $entradas,
                'salidas'  => $salidas,
                'neto'     => $entradas - $salidas,
            ];
        }

        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;

        $monthlyTotals = $this->monthlyTotals;
        $year = $this->year;

        $pdf = SnappyPdf::loadView('pdf.IngresosEgresosAño', compact('user', 'empresa', 'nit', 'direccion', 'telefono', 'celular', 'results', 'monthlyTotals', 'year'));
        return $pdf->download('IngresosEgresosAño.pdf');       
    }

    public function IngresosEgresosMes(Request $request, $fecha_inicio, $fecha_fin){

        $inicio = Carbon::parse($fecha_inicio)->startOfDay();
        $fin    = Carbon::parse($fecha_fin)->endOfDay();
        
        $registros = \App\Models\IngresosEgresos::whereBetween('fecha_ingreso', [$inicio, $fin])
                      ->orderBy('fecha_ingreso','desc')
                      ->get();
 
        $sums = \App\Models\IngresosEgresos::whereBetween('fecha_ingreso', [$inicio, $fin])
            ->selectRaw('COALESCE(SUM(entrada),0) as entradas, COALESCE(SUM(salida),0) as salidas')
            ->first();

        $this->sumEntradas = $sums->entradas ?? 0;
        $this->sumSalidas  = $sums->salidas ?? 0;
        $this->year = now()->year;
        $this->mes = $inicio->monthName;

        $sumEntradas = $this->sumEntradas;
        $sumSalidas = $this->sumSalidas;
        
        $year = $this->year;
        $mes = $this->mes;

        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;

        
        $pdf = SnappyPdf::loadView('pdf.IngresosEgresosMes', compact('user', 'empresa', 'nit', 'direccion', 'telefono', 'celular', 'year', 'registros', 'sumEntradas', 'sumSalidas', 'mes','fecha_inicio','fecha_fin'));
        return $pdf->download('IngresosEgresosMes.pdf'); 
    }

    public function IngresosEgresosDia(Request $request, $fecha_inicio, $fecha_fin){

        $inicio = Carbon::parse($fecha_inicio)->startOfDay();
        $fin    = Carbon::parse($fecha_fin)->endOfDay();

        $query = IngresosEgresos::query()
            ->whereBetween('fecha_ingreso', [$inicio, $fin])
            ->orderBy('fecha_ingreso', 'desc');

        $registros = (clone $query)->paginate($this->perPage);

        $sums = (clone $query)
            ->selectRaw('COALESCE(SUM(entrada),0) as entradas, COALESCE(SUM(salida),0) as salidas')
            ->first();

        $this->sumEntradas = $sums->entradas ?? 0;
        $this->sumSalidas  = $sums->salidas ?? 0;
        $sumEntradas = $this->sumEntradas;
        $sumSalidas = $this->sumSalidas;
        $fecha = $this->fecha;

        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;

        
        $pdf = SnappyPdf::loadView('pdf.IngresosEgresosDia', compact('user', 'empresa', 'nit', 'direccion', 'telefono', 'celular', 'registros', 'sumEntradas', 'sumSalidas', 'fecha'));
        return $pdf->download('IngresosEgresosDia.pdf'); 
    }

    public function Pendientespago(){
        
        $inicio = now()->startOfMonth();
        $fin    = now()->endOfMonth();

        $afiliadosSinPago = Afiliado::whereHas('contratos', function($q){
                $q->where('status', 1); // opcional: solo contratos activos
            })
            ->whereDoesntHave('contratos.pagos', function($q) use ($inicio, $fin) {
                $q->whereBetween('fecha_pago', [$inicio, $fin]);
            })
            ->with(['tdocumentos','contratos' => fn($q) => $q->where('status',1)])
            ->get();
//dd($afiliadosSinPago);
        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa->nombre;
        $nit = $user->empresa->nit;
        $direccion = $user->empresa->direccion;
        $telefono = $user->empresa->telefono;
        $celular = $user->empresa->celular;

        
        $pdf = SnappyPdf::loadView('pdf.Pendientespago', compact('user', 'empresa', 'nit', 'direccion', 'telefono', 'celular', 'afiliadosSinPago'));
        return $pdf->download('Pendientespago.pdf'); 
    }
}