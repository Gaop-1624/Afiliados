<?php

namespace App\Livewire\Cajas;

use App\Models\Caja as ModelsCaja;
use Livewire\Component;
use Livewire\WithPagination;

class Caja extends Component
{
    use WithPagination;

    public $cajass, $search;

      public function update(ModelsCaja $caja){
         return redirect()->route('Cajas.Cajas.Edit', ['cajaid' => $caja->id]);
    } 

    public function delete(ModelsCaja $caja)
    {
        $caja->delete();
        $this->redirectRoute('Cajas.Cajas');
    }

    public function render()
    {
        $Cajas = ModelsCaja::where('id', 'like', '%'.$this->search. '%')
                ->orWhere('nit', 'like', '%'.$this->search. '%') 
                ->orWhere('codigo', 'like', '%'.$this->search. '%') 
                ->orWhere('nombre', 'like', '%'.$this->search. '%') 
                ->orderBy('id','DESC')
                ->paginate(3);

        return view('livewire.cajas.caja', [
            'cajas' => $Cajas
        ]);
    }
}
