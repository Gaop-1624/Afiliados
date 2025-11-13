<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    use HasRoles;

   protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function suspend(){
        $this->suspended_at = now();
        $this->save();
    }

    public function isSuspended(){
       return $this->suspended_at ? true : false;
       
    }

    public function unsuspended(){
        $this->suspended_at = NULL;
        $this->save();
    }

     public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id','id');
    } 

     public function afiliado(){
        return $this->belongsTo(Afiliado::class, 'afiliado_id', 'id');
    } 

    //Relacion uno a muchos con el prestamo
    public function pagos(){
        return $this->hasMany(Pagos::class, 'afiliado_id');
    }

      public function contrato(){
        return $this->hasMany(Contrato::class, 'user_id', 'id');
    }
}
