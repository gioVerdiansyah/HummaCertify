<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;


interface Categoris
{
     /**
     * One-to-Many relationship with Article Category Model
     *
     * @return HasMany
     */

     public function Category(): HasMany;
}
