<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateExistStoreRequest extends FormRequest
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
            'bidang' => 'required|string|max:50',
            'sub_bidang' => 'nullable|string|max:50',
            'tanggal' => 'required|date',
            'certificate_categori_id' => 'required|exists:certificate_categoris,id',
            'predikat' => 'required|in:Sangat Baik,Baik,Cukup,Kurang',
            // detail
            'category-group.*.materi' => 'nullable|string|max:85|required_with:category-group.*.jam_pelajaran',
            'category-group.*.jam_pelajaran' => 'nullable|numeric|gt:1|max:4000|required_with:category-group.*.materi|regex:/^[0-9]+$/',
            'instruktur' => 'nullable|string|max:50|required_with:category-group.*.materi,category-group.*.jam_pelajaran',
        ];
    }
}
