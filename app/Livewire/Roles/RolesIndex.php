<?php

namespace App\Livewire\Roles;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolesIndex extends Component
{
    public $roleid;

    public function update(Role $role){
        return redirect()->route('Admin.Roles.Edit', ['roleId' => $role->id]);
    } 

    function delete(Role $role)
    {
        $role->delete();
        LivewireAlert::title('¡Rol Eliminado!')
        ->success()
        ->show(); 

        $this->redirectRoute('Admin.Roles');
    }

    public function render()
    {
        $roles = Role::where('name', 'like', '%'.request('search'). '%')
        ->orWhere('created_at', 'like', '%'.request('search'). '%') 
        ->paginate(4);

        return view('livewire.roles.roles-index', [
            'roles' => $roles
        ]);
    }
}
