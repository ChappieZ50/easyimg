<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Message;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $filesCount = File::count();
        $usersCount = User::count();
        $messagesCount = Message::count();
        $pagesCount = Page::count();


        $files = File::orderByDesc('id')->take(5)->get();
        $users = User::orderByDesc('id')->take(5)->get();

        $labels = explode(',', config('imgpool.accepted_mimes'));

        return view('ipool.home')->with([
            'filesCount' => $filesCount,
            'usersCount' => $usersCount,
            'messagesCount' => $messagesCount,
            'pagesCount' => $pagesCount,
            'files' => $files,
            'users' => $users,
            'chart_file_data' => $this->getChartData(File::class),
            'chart_user_data' => $this->getChartData(User::class),
            'chart_user_status_data' => $this->getUserStatusChart(),
            'chart_file_extension_data' => $this->getFileExtensionChart(),
            'chart_file_extension_labels' => $labels,
            'chart_user_login_data' => $this->getUserLoginChart(),
        ]);
    }

    public function getChartData($model, $primary = 'id')
    {
        $files = $model::select($primary, 'created_at')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });

        $filecount = [];
        $fileArr = [];

        foreach ($files as $key => $value) {
            $filecount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($filecount[$i])) {
                $fileArr[$i] = $filecount[$i];
            } else {
                $fileArr[$i] = 0;
            }
        }
        return $fileArr;
    }

    public function getUserStatusChart()
    {
        $users =  User::groupBy('status')->select('status', DB::raw('count(*) as count'))->get()->toArray();

        $data = [];

        foreach ($users as $key => $value) {
            $data[$value['status']] = $value['count'];
        }

        return $data;
    }

    public function getFileExtensionChart()
    {
        $files = File::select('file_mime', DB::raw('count(*) as count'))
            ->groupBy('file_mime')
            ->get()->toArray();


        $data = [];

        foreach ($files as $key => $value) {
            $data[$value['file_mime']] = $value['count'];
        }

        return $data;
    }

    public function getUserLoginChart()
    {
        $users = User::select('google', 'facebook', DB::raw('count(*) as count'))
            ->groupBy('google', 'facebook')
            ->get()->toArray();


        $data = [];

        foreach ($users as $value) {
            $count = $value['count'];
            if(!empty($value['google'])){
                $data['google'] = isset($data['google']) ? $count + $data['google'] : $count;
            }elseif(!empty($value['facebook'])){
                $data['facebook'] = isset($data['facebook']) ? $count + $data['facebook'] : $count;
            }else{
                $data['normal'] = isset($data['normal']) ? $count + $data['normal'] : $count;
            }
        }

        return $data;
    }
}
