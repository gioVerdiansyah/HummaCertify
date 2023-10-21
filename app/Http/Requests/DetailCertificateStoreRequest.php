<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailCertificateStoreRequest extends FormRequest
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
            'category-group.*.materi' => 'required',
            'category-group.*.jam_pelajaran' => 'required|numeric',
            'predikat' => 'required',
            'instruktur' => 'required',
        ];
    }
    public function message(): array
    {
        return [];
    }
}
