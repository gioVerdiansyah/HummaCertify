<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetInterfaceId
{
    /**
     * Handle the Get data event from models.
     *
     * @param mixed $id
     * @return mixed
     */
    public function getId($id): mixed;
}
