<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CertificateUpdateRequest extends FormRequest
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
        $idCert = $this->route("certificate");
        $certificate = Certificate::with('user')->where("id", $idCert)->first();
        $userId = $certificate->user->id;

        return [
            // user
            'name' => [
                'required',
                'string',
                Rule::unique('users', 'name')->ignore($userId),
            ],
            'email' => [
                'nullable',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'nomor_induk' => [
                'required',
                'string',
                Rule::unique('users', 'password')->ignore($userId),
                'min:8',
                'regex:/^[0-9]+$/',
            ],
            'ttl' => 'required',
            'institusi' => 'required|string|max:60',
            // certificate
            'bidang' => 'required|string|max:80',
            'tanggal' => 'required|date',
            'sub_bidang' => 'nullable|string|max:80',
            'certificate_categori_id' => 'required|exists:certificate_categoris,id',
            'predikat' => 'required|in:Sangat Baik,Baik,Cukup,Kurang',
            'instruktur' => 'required|max:50',
            // detail
            'category-group' => 'required',
            'category-group.*.materi' => 'required|string|max:85',
            'category-group.*.jam_pelajaran' => 'required|numeric|gt:1|max:4000|regex:/^[0-9]+$/',
        ];
    }
}
