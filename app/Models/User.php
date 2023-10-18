<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Certificate;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use App\Base\Interfaces\HasCertificates;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasCertificates
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    public $incrementing = false, $keyType = "string";
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    /**
     * Definisikan relasi Many-to-Many dengan model CertificateCategori.
     *
     * @return HasMany
     */
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
