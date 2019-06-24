<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;


class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post'))
            return $this->createRules();
        else
            return $this->updateRules();
    }

    private function createRules()
    {
        return [
            'name' => 'required|max:30|alpha_dash|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'rol' => 'required|boolean'
        ];
    }

    private function updateRules()
    {
        return [
            'name' => 'required|max:30|alpha_dash|unique:users,name,'.$this->route('usuario')->id,
            'email' => 'required|email|unique:users,email,'.$this->route('usuario')->id,
            'clave_nueva' => 'sometimes|required|min:8',
            'clave_actual' => ['sometimes','required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, $this->route('usuario')->password))
                        return $fail(__('La clave actual es incorrecta.'));
                }
            ]
        ];
    }
}
