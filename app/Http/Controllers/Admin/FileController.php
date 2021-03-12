<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $files = File::orderByDesc('id');
        if ($request->has('s')) {
            $s = $request->get('s');
            $files->whereHas('user', function ($query) use ($s) {
                return $query->where('username', 'like', '%' . $s . '%')->orWhere('email', 'like', '%' . $s . '%');
            })->orWhere('file_id', 'like', '%' . $s . '%');
        }
        return view('ipool.files.files')->with('files', $files->paginate());
    }

    public function show($id)
    {
        $file = File::findOrFail($id);
        if (!$file->user) {
            $file->user = json_decode(json_encode(config('imgpool.anonymous_user')));
        }

        return view('ipool.files.file')->with('file', $file);
    }


    public function destroyLocalFile($name)
    {
        return FacadesFile::delete($name);
    }

    public function destroyAwsFile($name)
    {
        return Storage::disk('s3')->delete($name);

    }

    public function destroy($id)
    {
        $file = File::where('id', $id)->first();

        if ($file) {
            if ($file->uploaded_to === 'aws') {
                $destroy = $this->destroyAwsFile(config('imgpool.aws_folder') . '/' . $file->file_full_id);
            } else {
                $destroy = $this->destroyLocalFile(config('imgpool.local_folder') . '/' . $file->file_full_id);
            }


            if ($destroy) {
                $file->delete();
                return response()->json(['status' => true]);
            }
        }

        return response()->json(['status' => false]);
    }
}
