<?php

namespace App\Livewire\Movimentos;

use App\Models\IngresosEgresos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CierreDiario extends Component
{
    use WithPagination;

    public $fecha;
    public $perPage = 15;

    public $sumEntradas = 0;
    public $sumSalidas = 0;

    public function closemodal(){
       $this->redirectRoute('dashboard');
    }

    public function limpiar(){
         $this->redirectRoute('Movimiento.CirerreDiario');
    }

    public function mount()
    {
        $this->fecha = Carbon::now()->toDateString(); // hoy por defecto
    }

    public function updatedFecha()
    {
        $this->resetPage();
    }

    public function render()
    {
        $inicio = Carbon::parse($this->fecha)->startOfDay();
        $fin    = Carbon::parse($this->fecha)->endOfDay();

        $query = IngresosEgresos::query()
            ->whereBetween('fecha_ingreso', [$inicio, $fin])
            ->where('user_id', Auth::id())
            ->orderBy('fecha_ingreso', 'desc');

        $registros = (clone $query)->paginate($this->perPage);

        $sums = (clone $query)
            ->selectRaw('COALESCE(SUM(entrada),0) as entradas, COALESCE(SUM(salida),0) as salidas')
            ->first();

        $this->sumEntradas = $sums->entradas ?? 0;
        $this->sumSalidas  = $sums->salidas ?? 0;

        return view('livewire.movimentos.cierre-diario', [
             'ingresosEgresos' => $registros
        ]);
    }
}
