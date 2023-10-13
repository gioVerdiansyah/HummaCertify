<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * Handle model initialization.
     *
     * @var Model $model
     */

    public Model $model;

    public function swal($icon = 'success', $title, $text)
    {
        session()->flash('message', [
            'icon' => $icon,
            'title' => $title,
            'text' => $text
        ]);
    }
}
