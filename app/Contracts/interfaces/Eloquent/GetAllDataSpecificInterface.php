<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetAllDataSpecificInterface{
    /**
     * Mendapatkan data relationship dengan nama method yang sudah terdaftar di modelnya
     *
     * @param string $relationship
     *
     * @return mixed
     */
    public function getAllDataSpecific():mixed;
}
