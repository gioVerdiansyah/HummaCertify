<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasAbsen
{
     /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */

     public function name(): BelongsTo;
}
