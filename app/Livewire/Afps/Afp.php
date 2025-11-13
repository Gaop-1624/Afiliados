<?php

namespace App\Livewire\Afps;

use App\Models\Afp as ModelsAfp;
use Livewire\Component;

class Afp extends Component
{
    public $afps, $search;
   

    public function update(ModelsAfp $afp){
         return redirect()->route('Afps.Afps.Edit', ['afpid' => $afp->id]);
    } 

    public function delete(ModelsAfp $afp)
    {
        $afp->delete();
        $this->redirectRoute('Afps.Afps');
    }

    public function render()
    {
        $Afps = ModelsAfp::where('id', 'like', '%'.$this->search. '%')
                ->orWhere('nit', 'like', '%'.$this->search. '%') 
                ->orWhere('codigo', 'like', '%'.$this->search. '%') 
                ->orWhere('nombre', 'like', '%'.$this->search. '%') 
                ->orderBy('id','DESC')
                ->paginate(6);

        return view('livewire.afps.afp', [
            'afpss' => $Afps
        ]);
    }
}
