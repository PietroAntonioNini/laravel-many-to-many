<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTypeRequest extends FormRequest
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
        // Ottieni l'ID della categoria attualmente in fase di aggiornamento
        $projectId = $this->route('types') ? $this->route('types')->id : null;

        return [
            'title' => [
                'required',
                'max:20',
                Rule::unique('types')->ignore($projectId),
            ],
            'description' => 'nullable' 
        ];
    }

    public function messages(): array 
    {
        return [
            'title.unique' => 'Esiste già un Tipo con questo nome!',
            'title.required' => 'Inserisci un Titolo',
            'title.max' => 'Il campo Titolo deve avere massimo :max caratteri',
        ];
    }
}
