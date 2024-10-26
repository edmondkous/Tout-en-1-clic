<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom_prod'=>'required',
            'slug'=>'required',
            'prix'=>'required',
            'categorie_id'=>'required',
            'marque_id'=>'required',
            'qty'=>'required',
            'description'=>'required',
            'image'=>'required',

        ];
    }

    public function messages()
    {
        return[
            'nom_prod.required'=>'Ce champ est obligatoire',
            'prix.required'=>'Ce champ est obligatoire',
            'categorie_id.required'=>'Ce champ est obligatoire',
            'stock.required'=>'Ce champ est obligatoire',
            'designation.required'=>'Ce champ est obligatoire',
            'image.required'=>'Ce champ est obligatoire',

        ];
    }
}
