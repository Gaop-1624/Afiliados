<?php

namespace App\Livewire\Epss;

use App\Models\Ep;
use Livewire\Component;
use Livewire\WithPagination;

class Eps extends Component
{
    use WithPagination;

    public $eps, $search;

    public function update(Ep $eps){
         return redirect()->route('Eps.Eps.Edit', ['epsid' => $eps->id]);
    } 

    public function delete(Ep $eps)
    {
        $eps->delete();
        $this->redirectRoute('Eps.Eps');
    }

    public function render()
    {
        $eps = Ep::where('id', 'like', '%'.$this->search. '%')
            ->orWhere('nit', 'like', '%'.$this->search. '%') 
            ->orWhere('codigo', 'like', '%'.$this->search. '%') 
            ->orWhere('nombre', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(4);

        return view('livewire.epss.eps', [
            'Epss' => $eps
        ]);
    }
}
