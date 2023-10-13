<?php

namespace App\Contracts\Interfaces\Eloquent;

interface SoftDeleteInterface
{
    /**
     * Implement soft delete method
     *
     * @param mixed $id
     * @return mixed
     */

    public function softDelete(mixed $id): mixed;
}
