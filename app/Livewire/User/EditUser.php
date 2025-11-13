<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public $email,  $password_confirmation, $empresa_id, $userid,  $name, $password, $user;
    public $rol;

    public function create(){

        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa_id;
    
        $user = User::updateOrCreate(
            ['id' => $this->userid], 
            [
            'name' => $this->name,
            'email' => $this->email,
            'empresa_id' =>$empresa,
            
        ]);
        $user->syncRoles($this->rol);

        LivewireAlert::title('¡Rol Agsinado!')->success()->show();      
        
        $this->redirectRoute('Admin.Users');
        
    }
    
    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Admin.Users');
    }

    public function mount($userid = null)
    { 
        $this->user = $userid;
    } 

    public function render()
    {
        $user = User::find($this->userid);
        $roles = Role::all();
        $nrole = ($user->roles()->first()->name) ?? "";

        return view('livewire.user.edit-user', [
            'roles' => $roles,
            $this->name = $user->name,
            $this->email = $user->email,
            $this->rol = $nrole
        ]);
    }
}
