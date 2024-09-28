<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'name' => 'required|string',
            'description' => 'required|string',
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'company_id.required' => 'El campo company_id es obligatorio.',
            'company_id.exists' => 'La compañía especificada no existe.',
            'user_id.required' => 'El campo user_id es obligatorio.',
            'user_id.exists' => 'El usuario especificado no existe.',
        ];
    }
}
