<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required|integer|gt:0',
            'certificate_categori_id'=>'required|exists:certificate_categoris,id',
            'tanggal' => 'required|date',
            'divisions' => 'required',
        ];
    }
    public function message(): array
    {
        return [];
    }
}