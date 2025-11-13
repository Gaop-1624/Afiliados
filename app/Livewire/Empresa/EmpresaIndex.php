<?php

namespace App\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithPagination;

class EmpresaIndex extends Component
{
    use WithPagination;
    public $search;

    public function view(Empresa $empresa){
        return redirect()->route('Empresa.Show', ['empresaId' => $empresa->id]);
    } 

     public function update(Empresa $empresa){
        return redirect()->route('Empresa.Modificar', ['empresaId' => $empresa->id]);
    } 

    public function render()
    {
       
        $empresas = Empresa::where('nit', 'like', '%'.$this->search. '%')
            ->orWhere('nombre', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(3);

        return view('livewire.empresa.empresa-index', [
            'empresas' => $empresas,
        ]);
    }
}
