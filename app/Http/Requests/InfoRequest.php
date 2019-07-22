<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'civilite' => 'required',
            'nom' => 'required|min:3|max:30',
            'prenom' => 'required|min:3|max:30',
            'adresse' => 'required|min:3|max:255',
            
            'ville' => 'required',
            'paye' => 'required',
            'dateNaissance' => 'required',
            'telephonne' => 'required|min:9|max:10',

        ];
    }
}
