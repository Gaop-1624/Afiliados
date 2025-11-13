<?php

namespace App\Livewire\Planillas;

use Livewire\Component;

class GenerarPlanillas extends Component
{
    public $activeTab = 'Integrales';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.planillas.generar-planillas');
    }
}
