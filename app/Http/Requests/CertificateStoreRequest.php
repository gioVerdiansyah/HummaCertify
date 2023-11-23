<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:users,name',
            'email' => ['nullable', 'email:rfc,dns', 'unique:users,email'],
            'nomor_induk' => 'required|string|min:8|unique:users,nomor_induk|regex:/^[0-9\/.\-]+$/',
            'ttl' => 'required|max:40',
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
            'category-group.*.jam_pelajaran' => 'required|numeric|gt:1|max:10000',

        ];
    }

    public function message(): array
    {
        return [
            //peserta
            'name.required' => 'nama harus di isi',
            'name.unique' => 'nama sudah di gunakan',
            'name.string' => 'nama harus berupa huruf tidak boleh angka',
            'email.required' => 'email harus di isi',
            'email.email' => 'email harus berformat email',
            'email.unique' => 'email sudah di gunakan',
            'ttl.required' => 'ttl harus di isi',
            'ttl.max' => 'tempat tanggal lahir maksimal max:',
            'institusi.required' => 'institusi harus di isi',
            'nomor_induk.required' => 'nomor induk harus di isi',
            'nomor_induk.min' => 'nomor induk minimal :min',
            'nomor_induk.regex' => 'format nomor induk harus benar',
            //certificate
            'bidang.required' => 'bidang harus di isi',
            'tanggal.required' => 'tanggal harus di isi',
            'tanggal.date' => 'tanggal harus berbentuk date',
            'certificate_categori_id.required' => 'kategori sertificate harus di isi',
            'certificate_categori_id.exists' => 'kategori tidak di temukan',
            'predikat.required' => 'predikat harus di isi',
            'predikat.in' => 'data predikat tidak cocok',
            'instruktur.required' => 'instruktur harus di isi',
            //detail
            'category-group.required' => 'Detail pemateri di perlukan!',
            'category-group.*materi.max' => 'materi maximal :max',
            'category-group.*materi.required_with' => 'data harus di isi',
            'category-group.*jam_pelajaran.numeric' => 'jam pelajaran harus :numeric',
            'category-group.*jam_pelajaran.max' => 'jam pelajaran maximal :max',
            'category-group.*jam_pelajaran.regex' => 'formar jam pelajaran harus benar (regex)',
        ];
    }
}
