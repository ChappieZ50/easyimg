<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request){
        $files = File::orderByDesc('id');
        if ($request->has('s')) {
            $s = $request->get('s');
            $files->whereHas('user' ,function($query) use($s){
                return $query->where('username','like','%'.$s.'%')->orWhere('email','like','%'.$s.'%');
            })->orWhere('file_id', 'like', '%' . $s . '%');
        }
        return view('irob.files.files')->with('files', $files->paginate());
    }

    public function show($id)
    {
        $file = File::findOrFail($id);

        return view('irob.files.file')->with('file', $file);
    }

    public function delete(Request $request){
        $id = $request->get('id');
        return response()->json([
            'id' => $id
        ]);
    }
}
