<?php

namespace App\Contracts\Interfaces\Eloquent;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface CustomPaginationInterface
{
    /**
     * Handle paginate data event from models.
     *
     * @param Request $request
     * @param int $pagination
     *
     * @return LengthAwarePaginator
     */

    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator;
}
