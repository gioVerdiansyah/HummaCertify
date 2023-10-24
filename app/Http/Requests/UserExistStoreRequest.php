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
            // user
            'user_id' => 'required|exists:users,id',
            // certificate
            'bidang' => 'required|string',
            'tanggal' => 'required|date',
            'sub_bidang' => 'nullable',
            'certificate_categori_id' => 'required|exists:certificate_categoris,id',
            'predikat' => 'required|in:Sangat Baik,Baik,Cukup,Kurang',
            // detail
            'category-group.*.materi' => 'nullable|string|max:85|required_with:category-group.*.jam_pelajaran',
            'category-group.*.jam_pelajaran' => 'nullable|numeric|gt:1|max:999|required_with:category-group.*.materi',
            'instruktur' => 'nullable|string|required_with:category-group.*.materi,category-group.*.jam_pelajaran',
        ];
    }
}
