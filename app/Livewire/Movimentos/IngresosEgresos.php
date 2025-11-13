<?php

namespace App\Livewire\Movimentos;

use App\Models\IngresosEgresos as ModelsIngresosEgresos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IngresosEgresos extends Component
{
    use WithPagination;

    public $search, $month, $year;

    public function closeModal(){
       $this->redirectRoute('dashboard');
    }

    public function limpiar(){
         $this->redirectRoute('Movimiento.CirerreAño');
    }

    public function searchtabla(){
        return 'hola';
    }
    
    public function render()
    {

              
        $TotalIngresos = ModelsIngresosEgresos::sum('entrada');
        $TotalGastos = ModelsIngresosEgresos::sum('salida');
        $Total= $TotalIngresos - $TotalGastos;

       
       $ingresosEgresos = ModelsIngresosEgresos::where('fecha_ingreso', 'like', '%'.$this->year. '%')
            ->orWhere('user_id', Auth::id())
            
            ->orWhere('mes', 'like', '%'.$this->month. '%')
            ->orderBy('id','DESC')
            ->paginate(6);
     

        return view('livewire.movimentos.ingresos-egresos', [
            'ingresosEgresos' => $ingresosEgresos,
            'TotalGastos' => $TotalGastos,
            'TotalIngresos' => $TotalIngresos,
            'Total' => $Total
        ]);
    }
}
