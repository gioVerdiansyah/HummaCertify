<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\GetRelationshipInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface CertificateInterface extends StoreInterface, UpdateInterface,GetInterface,GetRelationshipInterface
{

}
