<?php

namespace App\Contracts\Interfaces\Eloquent;

interface ShowSlugInterface
{
    /**
     * Handle get the specified data by id from models.
     *
     * @param string $slug
     * @return mixed
     */

    public function showWithSlug(string $slug): mixed;
}
