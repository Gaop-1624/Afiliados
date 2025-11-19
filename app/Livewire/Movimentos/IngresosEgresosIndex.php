<?php

namespace App\Livewire\Movimentos;

use App\Models\IngresosEgresos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IngresosEgresosIndex extends Component
{
    use WithPagination;

    public $fecha_inicio;
    public $fecha_fin;
    public $perPage = 10;
    public $sumEntradas = 0;
    public $sumSalidas = 0;

    public function closemodal(){
       $this->redirectRoute('dashboard');
    }

     public function limpiar(){
         $this->redirectRoute('Movimiento.IngresosEgresosIndex');
    }
    
    public function mount()
    {
        $this->fecha_inicio = now()->startOfMonth()->toDateString();
        $this->fecha_fin = now()->endOfMonth()->toDateString();
    }

    public function updatedFechaInicio() { $this->resetPage(); }
    public function updatedFechaFin() { $this->resetPage(); }

    public function render()
    {
    // normalizar límites (incluir todo el día)
        $inicio = \Carbon\Carbon::parse($this->fecha_inicio)->startOfDay();
        $fin    = \Carbon\Carbon::parse($this->fecha_fin)->endOfDay();

        $query = \App\Models\IngresosEgresos::query()
            ->whereBetween('fecha_ingreso', [$inicio, $fin])
            ->where('user_id', Auth::id())
            ->orderBy('fecha_ingreso', 'desc');

        $registros = $query->paginate($this->perPage);

        $sums = (clone $query)
            ->selectRaw('COALESCE(SUM(entrada),0) as entradas, COALESCE(SUM(salida),0) as salidas')
            ->first();

        $this->sumEntradas = $sums->entradas ?? 0;
        $this->sumSalidas  = $sums->salidas ?? 0;

        return view('livewire.movimentos.ingresos-egresos-index', [
            'ingresosEgresos' => $registros
        ]);
    }
}
