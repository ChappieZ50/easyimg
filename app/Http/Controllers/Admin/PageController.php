<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::orderByDesc('id');
        if ($request->has('s')) {
            $s = $request->get('s');
            $pages->where('title', 'like', '%' . $s . '%')->orWhere('slug', 'like', '%' . $s . '%');
        }
        return view('irob.pages.pages')->with('pages', $pages->paginate());
    }

    public function create()
    {
        return view('irob.pages.page');
    }
}
