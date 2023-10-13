<?php

namespace App\Contracts\Interfaces\Eloquent;

interface BaseInterface extends
    GetInterface,
    StoreInterface,
    ShowInterface,
    UpdateInterface,
    DeleteInterface
{
}
