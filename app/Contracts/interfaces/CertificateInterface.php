<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\GetInterfaceId;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\GetRelationshipInterface;

interface CertificateInterface extends StoreInterface, UpdateInterface,GetInterface,GetRelationshipInterface,GetInterfaceId
{

}
