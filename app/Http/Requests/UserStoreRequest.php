<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'nomor_induk' => 'required|gt:0|min:10',
            'ttl' => 'required',
            'institusi' => 'required|string',
        ];
    }
    public function message(): array
    {
        return [
            'name.required' => 'nama harus di isi',
            'name.string' => 'nama harus berupa huruf tidak boleh angka',
            'email.required' => 'email harus di isi',
            'email.email' => 'email harus berformat email',
            'ttl.required' => 'ttl harus di isi',
            'institusi.required' => 'institusi harus di isi',
            'nomor_induk.required' => 'nomor induk harus di isi',
            'nomor_induk.min' => 'nomor induk minimal :min',
            'nomor_induk.required' => 'nomor induk harus di isi',
        ];
    }
}
