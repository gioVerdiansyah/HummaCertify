<?php
namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CertificateCategori extends Model
{
    use HasFactory;

    public $incrementing = false, $keyType = "string";
    protected static function boot() { parent::boot(); static::creating(function ($model) { if (empty($model->{$model->getKeyName()})) { $model->{$model->getKeyName()} = Str::uuid()->toString(); }}); }

    protected $fillable = [
        'name',
    ];
}
