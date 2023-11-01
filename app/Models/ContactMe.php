<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class ContactMe extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'message'];
}
