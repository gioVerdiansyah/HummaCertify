<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasDetailCertificates
{
    /**
     * One-to-Many relationship with Article Model
     *
     * @return HasMany
     */

    public function detailCertificates(): HasMany;
}
