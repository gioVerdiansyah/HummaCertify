<?php
namespace App\Models;

use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CertificateCategori extends Model
{
    use HasFactory;

    // public $incrementing = false, $keyType = "string";
    // protected static function boot() { parent::boot(); static::creating(function ($model) { if (empty($model->{$model->getKeyName()})) { $model->{$model->getKeyName()} = Str::uuid()->toString(); }}); }

    protected $fillable = [
        'name',
    ];

     /**
     * Definisikan relasi Many-to-Many dengan model CertificateCategori.
     *
     * @return HasMany
     */
    public function Certificates():HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
