<?php

namespace App\Livewire\User;

use App\Exports\UsersExport;
use App\Models\User;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

use Livewire\Component;
use Livewire\WithPagination;

use Maatwebsite\Excel\Facades\Excel;

class UserIndex extends Component
{
    use WithPagination;

    public $search, $email,  $password_confirmation, $empresa_id, $userid;
    public $name, $password, $suspended_at;

    public function suspend($userId){

        $user = User::find($userId);

        if($user->isSuspended()){
            $user->unsuspended();

            LivewireAlert::title('!Usuario Activo!')->success()->show();
        }else{
            $user->suspend();

            LivewireAlert::title('!Usuario Suspendido!')->success()->show();
        }
    }

    public function update(User $user){
         return redirect()->route('Admin.Users.Edit', ['userid' => $user->id]);
         
    } 

    public function ExportAllUser(){
       return Excel::download(new UsersExport, 'users.xlsx'); 
    }

    public function ExportAllUserCsv(){
       return Excel::download(new UsersExport, 'users.csv'); 
    }

    function delete(User $usuario)
    {
   
        $usuario->delete();
        LivewireAlert::title('¡Usuario Eliminado!')
        ->success()
        ->show(); 

         $this->redirectRoute('Admin.Users');
    }

    public function render()
    {
        $users = User::where('empresa_id')
            ->where('id', 'like', '%'.$this->search. '%')
            ->orWhere('name', 'like', '%'.$this->search. '%') 
            ->orWhere('email', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(3);

        return view('livewire.user.user-index', [
            'users' => $users
        ]);
    }
}
