<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest {
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool true, si está autorizado
     */
    public function authorize() {
        return true;
    }

    /**
     * retorna las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ];
    }
}
