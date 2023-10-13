<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    /**
     * delete specified file in storage
     * @param string $file
     * @return void
     */

    public function remove(string $file): void
    {
        if ($this->exist($file)) Storage::delete($file);
    }

    /**
     * check specified file in storage
     * @param string $file
     * @return bool
     */

    public function exist(string $file): bool
    {
        return Storage::disk('public')->exists($file);
    }

    /**
     * Handle upload file to storage
     * @param string $disk
     * @param UploadedFile $file
     * @param bool $originalName
     * @return string
     */

    public function upload(string $disk, UploadedFile $file, bool $originalName = false): string
    {
        if (!$this->exist($disk)) Storage::makeDirectory($disk);

        if ($originalName) {
            return $file->storeAs($disk, $this->originalName($file));
        }
        return Storage::put($disk, $file);
    }

    /**
     * Handle get original name
     * @param UploadedFile $file
     * @return string
     */

    public function originalName(UploadedFile $file): string
    {
        return $file->getClientOriginalName();
    }

    /**
     * Handle get original extension
     * @param UploadedFile $file
     * @return string
     */

    public function originalExtension(UploadedFile $file): string
    {
        return $file->getClientOriginalExtension();
    }
}
