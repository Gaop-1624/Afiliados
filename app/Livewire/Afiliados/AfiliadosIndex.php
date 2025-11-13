<?php

namespace App\Livewire\Afiliados;

use App\Exports\AfiliadosExport;
use App\Models\Afiliado;
use App\Models\contrato;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

use Livewire\Component;
use Livewire\WithPagination;

use Maatwebsite\Excel\Facades\Excel;

class AfiliadosIndex extends Component
{
    use WithPagination;

    public $search, $status;

    public function update(Afiliado $afiliado){
        return redirect()->route('Afiliados.Edit', ['afiliadoId' => $afiliado->id]);
    } 

    public function view(Afiliado $afiliado){
        return redirect()->route('Afiliados.Show', ['afiliadoId' => $afiliado->id]);
    } 

    public function ExportAllAfiliados(){
       return Excel::download(new AfiliadosExport, 'afiliados.xlsx'); 
    }

    public function ExportAllAfiliadosCsv(){
       return Excel::download(new AfiliadosExport, 'afiliados.csv'); 
    }

    function delete(Afiliado $afiliado)
    {
        
            $afiliado->delete();
            LivewireAlert::title('¡Afiliado Eliminado!')
            ->success()
            ->show(); 

            $this->resetPage();
            
    }

    public function render()
    {
        
        $query = Afiliado::query();

        // Filtrar por usuario logueado
        $query->where('user_id', Auth::id());

        // Filtro de búsqueda (si hay texto en $this->search)
        if (!empty($this->search)) {
            $s = $this->search;
            $query->where(function($q) use ($s) {
                $q->where('id', 'like', '%'.$s.'%')
                  ->orWhere('documento', 'like', '%'.$s.'%')
                  ->orWhere('email', 'like', '%'.$s.'%')
                  ->orWhere('pnombre', 'like', '%'.$s.'%')
                  ->orWhere('snombre', 'like', '%'.$s.'%')
                  ->orWhere('papellido', 'like', '%'.$s.'%')
                  ->orWhere('sapellido', 'like', '%'.$s.'%');
            });
        }

        $afiliados = $query->orderBy('id','DESC')->paginate(6);

        return view('livewire.afiliados.afiliados-index', [
            'afiliados' => $afiliados,
        ]);
    }
}
