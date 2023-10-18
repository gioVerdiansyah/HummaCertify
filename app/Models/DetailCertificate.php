<?php

namespace App\Models;

use App\Base\Interfaces\HasCertificate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailCertificate extends Model implements HasCertificate
{
    use HasFactory;

    protected $guarded = [];

    public function certificate():BelongsTo{
        return $this->belongsTo(Certificate::class, 'certificate_id');
    }
}
