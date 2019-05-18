<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            //
            'Civilite' => 'required',
            'Nom' => 'required|min:3|max:30',
            'Prenom' => 'required|min:3|max:30',
            'Adresse' => 'required|min:3|max:255',
            'Ville' => 'required',
            'Paye' => 'required',
            'DateNaissance' => 'required',
            'Photo' => 'required',
            'Telephonne' => 'required|max:10|min:10',
            'Email' => 'required|email|unique:users',
            'Password' => 'required|min:8|max:30|confirmed',
            'Password_confirmation' => 'required_with:Password|same:Password|min:8',
        ];
    }
}