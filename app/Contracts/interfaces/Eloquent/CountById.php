<?php

namespace App\Contracts\Interfaces\Eloquent;

interface CountById
{
    /**
     * Handle count all data event from models.
     *
     *
     * @return int
     */

    public function countById(int $id): mixed;
}
