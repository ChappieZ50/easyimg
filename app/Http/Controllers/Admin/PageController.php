<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::orderByDesc('id');
        if ($request->has('s')) {
            $s = $request->get('s');
            $pages->where('title', 'like', '%' . $s . '%')->orWhere('slug', 'like', '%' . $s . '%');
        }
        return view('ipool.pages.pages')->with('pages', $pages->paginate());
    }

    public function create()
    {
        return view('ipool.pages.page');
    }

    public function store(PageRequest $request)
    {
        $store = Page::create([
            'title'   => $request->get('title'),
            'slug'    => Str::slug($request->get('slug')),
            'content' => $request->get('content'),
            'type'    => $request->get('type'),
        ]);

        if ($store) {
            return redirect()->route('admin.page.edit', $store->id)->with('success', 'Page successfully created.');
        } else {
            return back()->with('error', 'Something gone wrong.');
        }
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('ipool.pages.page')->with('page', $page);
    }

    public function update(Page $page, PageRequest $request)
    {
        $update = $page->update([
            'title'   => $request->get('title'),
            'slug'    => Str::slug($request->get('slug')),
            'content' => $request->get('content'),
            'type'    => $request->get('type')
        ]);

        if ($update) {
            return back()->with('success', 'Page successfully updated.');
        } else {
            return back()->with('error', 'Something gone wrong.');
        }
    }

    public function destroy($id)
    {
        $page = Page::where('id', $id)->first();
        if ($page && $page->delete()) {
            return response()->json(['message' => 'Page successfully deleted.', 'status' => true]);
        }

        return response()->json(['message' => 'Something gone wrong.', 'status' => false], 404);
    }

}
