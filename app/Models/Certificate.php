<?php

namespace App\Models;

use App\Models\User;
use App\Base\Interfaces\HasUsers;
use App\Models\DetailCertificate;
use App\Models\CertificateCategori;
use App\Base\Interfaces\HasCategories;
use Illuminate\Database\Eloquent\Model;
use App\Base\Interfaces\HasDetailCertificates;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model implements HasCategories, HasUsers, HasDetailCertificates
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate_categori_id',
        'tanggal',
        'bidang',
        'nomor',
        'predikat',
        'status'
    ];


      /**
     * Definisikan relasi BelongsTo dengan model CertificateCategori.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(CertificateCategori::class, 'certificate_categori_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
      /**
     * Definisikan relasi Many-to-Many dengan model CertificateCategori.
     *
     * @return HasMany
     */
    public function detailCertificates(): HasMany
    {
        return $this->hasMany(DetailCertificate::class, 'certificate_id');
    }
}
