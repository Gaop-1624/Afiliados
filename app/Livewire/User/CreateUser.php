<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateUser extends Component
{
    public $email,  $password_confirmation, $empresa_id, $userid,  $name, $password;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Admin.Users');
    }

    public function Rules(){
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->userid)
            ],
           'name' => [
                'required',
                'string',
                Rule::unique('users')->ignore($this->userid)
            ],
            'password' => [
                  'required',
                  'confirmed',
            ]  
        ];
    }

     public function create(){
        $this->validate($this->Rules()); 

        $user = User::find(Auth::user()->id);
        $empresa = $user->empresa_id;

        User::updateOrCreate(
            ['id' => $this->userid], 
            [
            'name' => $this->name,
            'email' => $this->email,
            'empresa_id' =>$empresa,
            'password' => bcrypt($this->password)
        ]);

         LivewireAlert::title('¡Usuario Creado!')
        ->success()
        ->timer(6000000)
        ->show(); 

        $this->closeModal();
     }

    public function render()
    {
        return view('livewire.user.create-user');
    }
}
