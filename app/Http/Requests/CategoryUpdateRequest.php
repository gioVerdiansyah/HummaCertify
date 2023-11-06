<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
        $id = $this->route('category');

        return [
            'namaKategori' => 'required|unique:certificate_categoris,name,'. $id .',id',
            'depan' => 'nullable|image|mimes:jpeg,png,jpg,jpeg',
            'belakang' => 'nullable|image|mimes:jpeg,png,jpg,jpeg',
            'tataletak' => 'required|in:Kelulusan,Pelatihan,Kompetensi',
        ];
    }

    public function messages(): array
    {
        return [
            'depan.required' => 'Background latar depan harus diunggah.',
            'depan.image' => 'File latar depan harus berupa gambar.',
            'depan.mimes' => 'File latar depan harus memiliki format jpeg, png, atau jpg.',

            'belakang.required' => 'Background latar belakang harus diunggah.',
            'belakang.image' => 'File latar belakang harus berupa gambar.',
            'belakang.mimes' => 'File latar belakang harus memiliki format jpeg, png, atau jpg.',

            'tataletak.required' => 'Tata letak harus dipilih.',
            'tataletak.in' => 'Tata letak harus menjadi salah satu dari Kelulusan, Pelatihan, atau Kompetensi.',
        ];
    }
}
