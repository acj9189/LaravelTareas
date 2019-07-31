<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define una relacion Eloquen entre el usuario y los roles
     * Se retorna la relación a la que pertenece
     */
    public function roles() {
        // belongsToMany puede recibir un segundo parámetro con el nombre del pivote si este no se creo usando la convención
        return $this->belongsToMany(Role::class); // pertenece a muchos
    }

    public function hasRoles(array $roles) {
        foreach ($roles as $role) {
            foreach ($this->roles as $userRole) {
                // se compara cada rol recibido como argumento, con uno de los roles de usuario
                if ($userRole->nombre === $role) {
                    return true;
                }
            }
        }
        return false;
    }
}
