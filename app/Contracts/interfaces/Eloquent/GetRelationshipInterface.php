<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetRelationshipInterface{
    /**
     * Mendapatkan data relationship dengan nama method yang sudah terdaftar di modelnya
     *
     * @param string $relationship
     *
     * @return mixed
     */
    public function getRelationship(string $relationship):mixed;
}
