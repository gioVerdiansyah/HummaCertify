<?php
namespace App\Models;

use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasCertificates;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CertificateCategori extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

     /**
     * Definisikan relasi Many-to-Many dengan model CertificateCategori.
     *
     * @return HasMany
     */
    public function certificates():HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
