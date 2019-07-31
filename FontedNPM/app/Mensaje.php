<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {

    protected $fillable = ['nombre', 'email', 'asunto', 'contenido'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}