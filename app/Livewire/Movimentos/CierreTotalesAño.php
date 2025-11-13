<?php

namespace App\Livewire\Movimentos;

use App\Models\Pagos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CierreTotalesAño extends Component
{
    public $fecha;
    public $year;
    public $monthlyTotals = [];
    public $totalEntradas = 0;
    public $totalSalidas = 0;
    public $totalNeto = 0;

    public function closeModal(){
       $this->redirectRoute('dashboard');
    }

    public function limpiar(){
         $this->redirectRoute('Movimiento.CirerreAño');
    }

    public function mount()
    {
        $this->fecha = now()->toDateString();
        $this->year = now()->year;
        $this->loadMonthlyTotals();
    }

    public function updatedYear()
    {
        $this->loadMonthlyTotals();
    }

    public function loadMonthlyTotals()
    {
        $query = Pagos::query()->with('contrato.afiliado');

        // Filtrar por usuario logueado
        $query->where('user_id', Auth::id());

        $results = DB::table('ingresos_egresos')
            ->selectRaw('MONTH(fecha_ingreso) as month, COALESCE(SUM(entrada),0) as entradas, COALESCE(SUM(salida),0) as salidas')
            ->whereYear('fecha_ingreso', $this->year)
            ->where('user_id', Auth::id()) // filtrar por usuario logueado
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

        // Totales anuales
+        $this->totalEntradas = array_sum(array_column($this->monthlyTotals, 'entradas'));
+        $this->totalSalidas  = array_sum(array_column($this->monthlyTotals, 'salidas'));
+        $this->totalNeto     = $this->totalEntradas - $this->totalSalidas;
    }

    public function render()
    {
        return view('livewire.movimentos.cierre-totales-año');
    }
}
