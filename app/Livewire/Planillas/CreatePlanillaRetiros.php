<?php

namespace App\Livewire\Planillas;

use App\Models\Afiliado;
use Livewire\Component;

class CreatePlanillaRetiros extends Component
{
    public $afiliadosSinPago;

    public function mount()
    {
        $this->loadAfiliadosSinPago();
    }

    public function loadAfiliadosSinPago()
    {
        $inicio = now()->startOfMonth();
        $fin    = now()->endOfMonth();

        $this->afiliadosSinPago = Afiliado::whereHas('contratos', function($q){
                $q->where('status', 1); // opcional: solo contratos activos
            })
            ->whereDoesntHave('contratos.pagos', function($q) use ($inicio, $fin) {
                $q->whereBetween('fecha_pago', [$inicio, $fin]);
            })
            ->with(['tdocumentos','contratos' => fn($q) => $q->where('status',1)])
            ->get();
    }

    public function render()
    {
        return view('livewire.planillas.create-planilla-retiros');
    }
}
