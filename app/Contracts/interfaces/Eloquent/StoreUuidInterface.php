<?php

namespace App\Contracts\Interfaces\Eloquent;

interface StoreUuidInterface
{
    /**
     * Handle store data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */

    public function store(array $data, string $uuid): mixed;
}
