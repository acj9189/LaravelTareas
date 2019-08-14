<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * Retorna cada rol con uno o todos los usuarios relacionados
     * dependiendo de si se usa hasOne o hasMany
     */
    public function user() {
        // return $this->hasOne(User::class);
        return $this->hasMany(User::class);
    }

}
