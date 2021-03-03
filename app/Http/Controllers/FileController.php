<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function store(FileRequest $request)
    {
        $file = $request->file('file');

        if (true) {
            return $this->toLocal($file);
        } else {
            return $this->toAws();
        }

        return response()->json([], 500);
    }

    public function toLocal($file)
    {
        $file = upload_file($file, config('imgfoo.local_folder'))->getData();
        $this->save($file->file_id, $file->file_size, $file->extension, $file->file_original_id);
        return response()->json([
            'url' => $file->url,
        ]);
    }

    public function toAws()
    {

    }

    public function save($fileId, $fileSize, $fileMime, $fileOriginalId, $uploadedTo = 'local')
    {
        $create = [
            'file_id'          => $fileId,
            'file_full_id'     => $fileId . '.' . $fileMime,
            'file_original_id' => $fileOriginalId,
            'file_size'        => $fileSize,
            'file_mime'        => $fileMime,
            'uploaded_to'      => $uploadedTo,
        ];
        if (Auth::check()) {
            $create['user_id'] = Auth::user()->id;
        }
        return File::create($create);
    }
}
