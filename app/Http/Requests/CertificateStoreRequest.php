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
            'name' => 'required|string',
            'email' => 'nullable|email',
            'nomor_induk' => 'required|string|min:8|regex:/^[0-9]+$/',
            'ttl' => 'required',
            'institusi' => 'required|string',
            // certificate
            'bidang' => 'required|string',
            'tanggal' => 'required|date',
            'sub_bidang' => 'nullable',
            'certificate_categori_id' => 'required|exists:certificate_categoris,id',
            'predikat' => 'required|in:Sangat Baik,Baik,Cukup,Kurang',
            'instruktur' => 'required',
            // detail
            'category-group.*.materi' => 'required|string|max:85',
            'category-group.*.jam_pelajaran' => 'required|numeric|gt:1|max:999|regex:/^[0-9]+$/',

        ];
    }

    public function message(): array
    {
        return [
            //peserta
            'name.required' => 'nama harus di isi',
            'name.string' => 'nama harus berupa huruf tidak boleh angka',
            'email.required' => 'email harus di isi',
            'email.email' => 'email harus berformat email',
            'ttl.required' => 'ttl harus di isi',
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
            'categori-group.*materi.max' => 'materi maximal :max',
            'categori-group.*materi.required_with' => 'data harus di isi',
            'categori-group.*jam_pelajaran.numeric' => 'jam pelajaran harus :numeric',
            'categori-group.*jam_pelajaran.max' => 'jam pelajaran maximal :max',
            'categori-group.*jam_pelajaran.regex' => 'formar jam pelajaran harus benar (regex)',
        ];
    }
}
