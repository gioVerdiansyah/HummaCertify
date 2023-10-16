<?php

namespace App\Models;

use App\Models\User;
use App\Base\Interfaces\HasUsers;
use App\Models\CertificateCategori;
use App\Base\Interfaces\HasCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model implements HasCategories, HasUsers
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate_categori_id',
        'tanggal',
        'divisions',
    ];


      /**
     * Definisikan relasi Many-to-Many dengan model CertificateCategori.
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
}
