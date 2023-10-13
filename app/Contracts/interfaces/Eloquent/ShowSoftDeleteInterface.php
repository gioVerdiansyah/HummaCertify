<?php

namespace App\Contracts\Interfaces\Eloquent;

interface ShowSoftDeleteInterface
{
    /**
     * Implement show soft delete method
     *
     * @param mixed $id
     * @return mixed
     */

    public function showSoftDelete(mixed $id): mixed;
}
