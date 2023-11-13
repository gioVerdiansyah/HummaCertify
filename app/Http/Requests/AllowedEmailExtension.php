<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;

class AllowedEmailExtension implements Rule
{
    public function passes($attribute, $value)
    {
        $allowedExtensions = ['com', 'id'];
        $emailParts = explode('.', $value);
        $extension = end($emailParts);
        return in_array($extension, $allowedExtensions);
    }

    public function message()
    {
        return 'Alamat email harus menggunakan ekstensi yang diizinkan.';
    }
}

