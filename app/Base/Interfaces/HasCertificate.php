<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


interface HasCertificate
{
     /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */

     public function certificate(): BelongsTo;
}
