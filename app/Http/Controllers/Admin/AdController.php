<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdRequest;
use App\Models\Ad;
use App\Models\User;

class AdController extends Controller
{
    public function index()
    {
        $ad = Ad::first();
        return view('ipool.ads')->with('ad',$ad);
    }

    public function store(AdRequest $request)
    {

        if ($this->updateOrCreate($request->validated())) {
            return back()->with('success', __('page.admin_response_ads_success'));
        } else {
            return back()->with('error', __('page.response_error'));
        }
    }

    private function updateOrCreate($data)
    {
        $ad = Ad::first();

        return $ad ? $ad->update($data) : Ad::create($data);
    }
}
