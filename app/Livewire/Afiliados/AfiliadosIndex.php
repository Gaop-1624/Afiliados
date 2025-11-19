<?php

namespace App\Livewire\Afiliados;

use App\Exports\AfiliadosExport;
use App\Imports\AfiliadosImport;
use App\Models\Afiliado;
use App\Models\contrato;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Maatwebsite\Excel\Facades\Excel;

class AfiliadosIndex extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search, $status, $importfile;
    public $modal = false;

    public function limpiarModal(){
        $this->resetValidation();
        $this->reset(['importfile']);
    }

     public function OpenModal(){
           $this->limpiarModal();
            $this->modal = true;
        }

    public function CloseModal(){
            $this->limpiarModal();
            $this->modal = false;
    }

    public function Import(){
         $this->validate([
            'importfile' => 'required|mimes:xlsx,csv,xls',
        ],[
            'importfile.required' => __('Please select a file to upload.'),
            'importfile.mimes' => __('The file must be an Excel or CSV file.'),
        ]);   

        try { 
            // pasar directamente el archivo sin guardar en disco
                Excel::import(new AfiliadosImport, $this->importfile);

                LivewireAlert::title(__('File imported successfully'))
                    ->success()
                    ->show();

                $this->reset(['importfile']);
                $this->CloseModal();
                $this->resetPage();

        } catch (\Exception $e) {
                LivewireAlert::title(__('There was an error importing the affiliates.'))
                    ->text($e->getMessage())
                    ->error()
                    ->show();
        } 
    }
    

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

        $afiliados = $query->orderBy('id','DESC')->paginate(3);

        return view('livewire.afiliados.afiliados-index', [
            'afiliados' => $afiliados,
        ]);
    }
}
