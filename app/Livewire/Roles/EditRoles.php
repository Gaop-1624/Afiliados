<?php

namespace App\Livewire\Roles;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRoles extends Component
{
    public $description, $name, $rolid, $rol;
    public $seletedpermiso = [];

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Admin.Roles');
    }

    public function create(){

        $role = Role::updateOrCreate(
            ['id' => $this->rol], 
            [
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $role->permissions()->sync($this->seletedpermiso); 
        LivewireAlert::title('¡Rol Actualizado!')->success()->show();
        
        $this->redirectRoute('Admin.Roles');
        
    }

    public function mount($roleId = null)
    { 
        $this->rol=$roleId;
    }

    public function render()
    {
        $permisos = Permission::all();
        $rol = Role::find($this->rol);
        $allpermisos = $rol->permissions;

        return view('livewire.roles.edit-roles', [
            'permisos' => $permisos,
            'rol' => $rol,
            'allpermisos' => $allpermisos,
            $this->name = $rol->name,
            $this->description = $rol->description,
        ]);
    }
}
