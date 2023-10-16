<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


interface HasUsers
{
     /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */

     public function Users(): BelongsTo;
}
