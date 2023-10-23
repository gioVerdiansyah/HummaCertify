<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserExistStoreRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'bidang' => 'required|string',
            'tanggal' => 'required|date',
            'sub_bidang' => 'nullable',
            'certificate_categori_id'=>'required|exists:certificate_categoris,id',
            'predikat' => 'required|in:Sangat Baik,Baik,Cukup,Kurang',
        ];
    }
}
