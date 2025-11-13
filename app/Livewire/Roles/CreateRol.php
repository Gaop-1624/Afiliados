<?php

namespace App\Livewire\Roles;

use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRol extends Component
{
    public $description, $name, $rolid;
    public $seletedpermiso = [];

     public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Admin.Roles');
    }

     public function Rules(){
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('roles')->ignore($this->rolid)
            ],
            'description' => [
                'required',
                'string',
            ],
        ];
    }

    public function create(){
        $this->validate($this->Rules()); 

        $role = Role::updateOrCreate(
            ['id' => $this->rolid], 
            [
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $role->permissions()->sync($this->seletedpermiso);

        LivewireAlert::title('¡Rol Creado!')
        ->success()
        ->timer(6000000)
        ->show();

        $this->redirectRoute('Admin.Roles');
    }

    public function render()
    {
        return view('livewire.roles.create-rol');
    }
}
