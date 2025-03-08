<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function moveFile($file, $directory)
    {
        $currentDate = Carbon::now()->toDateString();
        $uploadPath = 'uploads/' . $directory . '/' . $currentDate;

        Storage::makeDirectory($uploadPath);

        $filename = $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

        $filePath = $file->storeAs($uploadPath, $filename, 'public');

        return $filePath;
    }
}
