<?php
namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface HasCategories
{
    /**
     * Many-to-Many relationship with CertificateCategory model.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo;
}
