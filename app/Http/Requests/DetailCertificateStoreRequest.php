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
            // 'materi' => "required",
            // 'jam_pelajaran' => "required|integer|min:1|max:999"
        ];
    }
    public function message(): array
    {
        return [];
    }
}