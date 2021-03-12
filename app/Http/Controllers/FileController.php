<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function store(FileRequest $request)
    {
        $file = $request->file('file');
        $setting = Setting::first();

        $disk = '';
        $storage = 'local';
        $uploadFolder = config('imgpool.local_folder');

        if ($setting && $setting->uploads_storage === 'aws') {
            $disk = 's3';
            $storage = 'aws';
            $uploadFolder = config('imgpool.aws_folder');
        }

        $file = upload_file($file, $uploadFolder, '', $disk)->getData();
        $save = $this->save($file->file_id, $file->file_size, $file->extension, $file->file_original_id, $storage);
        if ($save) {
            return response()->json([
                'url' => route('file.show',$file->file_id),
            ]);
        }

        return response()->json([], 500);
    }

    public function save($fileId, $fileSize, $fileMime, $fileOriginalId, $storage = 'local')
    {
        $create = [
            'file_id'          => $fileId,
            'file_full_id'     => $fileId . '.' . $fileMime,
            'file_original_id' => $fileOriginalId,
            'file_size'        => $fileSize,
            'file_mime'        => $fileMime,
            'uploaded_to'      => $storage,
        ];
        if (Auth::check()) {
            $create['user_id'] = Auth::user()->id;
        }
        return File::create($create);
    }

    public function show($file)
    {
        $file = File::where('file_id', $file)->first();
        return $file ? view('file')->with('file', $file) : abort(404);
    }
}
