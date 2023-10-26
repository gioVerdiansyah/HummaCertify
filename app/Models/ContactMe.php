<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class ContactMe extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'message'];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (ContactMe $data) {
            Mail::to('hummacertify@gmail.com')->send(new \App\Mail\ContactMe($data));
        });
    }
}
