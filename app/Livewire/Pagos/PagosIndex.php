<?php

namespace App\Livewire\Pagos;

use App\Exports\PagosExport;
use App\Models\Afiliado;
use App\Models\Pagos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class PagosIndex extends Component
{
    use WithPagination;

    public $search;
    public $afiliadoId;
    public $perPage = 3;

    public function ExportAllPagos(){
       return Excel::download(new PagosExport, 'pagos.xlsx'); 
    }

    public function ExportAllPagosCsv(){
       return Excel::download(new PagosExport, 'pagos.csv'); 
    }

     public function ReciboPago(Pagos $pago){
        
        return redirect()->route('Reports.Pagos.Recibo', ['id' => $pago->id]);
    } 

    // Añadir para resetear paginación al cambiar afiliado
    public function updatedAfiliadoId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Pagos::query()->with('contrato.afiliado');

        // Filtrar por usuario logueado
        $query->where('user_id', Auth::id());

        // Filtrar por afiliado seleccionado (si existe)
        if (!empty($this->afiliadoId)) {
            $query->whereHas('contrato', function($q) {
                $q->where('afiliado_id', $this->afiliadoId);
            });
        }

        // Filtro de búsqueda (si hay texto en $this->search)
        if (!empty($this->search)) {
            $s = $this->search;
            $query->where(function($q) use ($s) {
                $q->where('id', 'like', '%'.$s.'%')
                  ->orWhere('codigo', 'like', '%'.$s.'%')
                  ->orWhere('periodo', 'like', '%'.$s.'%')
                  ->orWhereHas('contrato.afiliado', function($q2) use ($s) {
                      $q2->where('documento', 'like', '%'.$s.'%')
                         ->orWhere('pnombre', 'like', '%'.$s.'%')
                         ->orWhere('papellido', 'like', '%'.$s.'%');
                  });
            });
        }

        $pagos = $query->orderBy('id','DESC')->paginate($this->perPage);

        // pasar lista de afiliados del usuario para el filtro (opcional)
        $afiliados = \App\Models\Afiliado::where('user_id', Auth::id())->orderBy('pnombre')->get();

        return view('livewire.pagos.pagos-index', [
            'pagos' => $pagos,
            'afiliados' => $afiliados
        ]);
    }
}
