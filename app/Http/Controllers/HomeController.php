<?php

namespace App\Http\Controllers;

use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if ($page) {
            return view('page')->with('page', $page);
        }

        return abort(404);
    }
}
