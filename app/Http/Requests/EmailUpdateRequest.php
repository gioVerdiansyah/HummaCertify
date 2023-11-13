<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\AllowedEmailExtension;

class EmailUpdateRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email,' . auth()->id() . ',id'
        ];
    }

}
