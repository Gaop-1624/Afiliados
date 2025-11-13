<?php

namespace App\Livewire\Arls;

use App\Models\Arl as ModelsArl;
use Livewire\Component;
use Livewire\WithPagination;

class Arl extends Component
{
    use WithPagination;

    public $arls, $search;

    public function update(ModelsArl $arl){
         return redirect()->route('Arls.Arls.Edit', ['arlid' => $arl->id]);
    } 

    public function delete(ModelsArl $arl)
    {
        $arl->delete();
        $this->redirectRoute('Arls.Arls');
    }

    public function render()
    {
       
         $arls = ModelsArl::where('id', 'like', '%'.$this->search. '%')
            ->orWhere('nit', 'like', '%'.$this->search. '%') 
            ->orWhere('codigo', 'like', '%'.$this->search. '%') 
            ->orWhere('nombre', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(6); 

        return view('livewire.arls.arl', [
            'Arls' => $arls
        ]);
    }
}
