<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageTrait
{
    public function uploadImage(Request $request, string $fieldName, string $storagePath): string
    {
        $file = $request->file($fieldName);
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($storagePath, $filename, 'public');

        return $path;
    }

    public function deleteImage(string $path): bool
    {
        return File::delete($path);
    }
}
