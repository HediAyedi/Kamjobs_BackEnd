<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeurRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required',
            'mot_de_passe' => 'required|confirmed',
            'nom_entreprise' => 'required',
            'description_entreprise' => 'required',
            'matricule' => 'required',
            'site_web' => 'required',
            'adresse' => 'required',
            'telephone' => 'required|digits:8',
            'email' => 'required|email|unique:employeurs,email'
        ];
    }
}
