<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

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
                'email:rfc,dns',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'nomor_induk' => [
                'required',
                'string',
                Rule::unique('users', 'nomor_induk')->ignore($userId),
                'min:8',
                'regex:/^[0-9]+$/',
            ],
            'ttl' => 'required|max:100',
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

    public function message(): array
    {
        return [
            'name.required' => 'nama harus di isi woi',
            'name.string' => 'nama harus berupa huruf bukan angka',
            'email.email' => 'format email harus benar',
            'nomor_induk.required' => 'nomor induk harus di isi',
            'nomor_induk.string' => 'nomor induk harus huruf bukan angka',
            'nomor_induk.min' => 'nomor induk minimal 8',
            'nomor_induk.regex' => 'nomor induk harus valid',
            'ttl.required' => 'tempat tanggal lahir harus di isi',
            'ttl.max' => 'tempat tanggal lahir maksimal max:',
            'institusi.required' => 'institusi harus di isi',
            'institusi.string' => 'institusi harus huruf bukan angka',
            'institusi.max' => 'institusi maksimal max:',
            'bidang.required' => 'bidang harus di isi',
            'bidang.max' => 'bidang maksimal max:',
            'tanggal.required' => 'tanggal harus di isi',
            'tanggal.date' => 'tanggal harus valid',
            'sub_bidang.max' => 'sub bidang maksimal max:',

        ];
    }
}
