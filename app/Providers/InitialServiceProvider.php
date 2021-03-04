<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class InitialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hastable('settings')) {
            $setting = Setting::first();
            if ($setting) {
                $configSettings = Config::get('imgfoo.settings');
                foreach ($configSettings as $key => $value) {
                    if (isset($setting->$key)) {
                        Config::set('imgfoo.settings.' . $key, $setting->$key);
                    }
                }
            }
        }

        $s3 = [
            'driver' => 's3',
            'key' => Config::get('imgfoo.settings.aws_access_key'),
            'secret' => Config::get('imgfoo.settings.aws_secret_access_key'),
            'region' => Config::get('imgfoo.settings.aws_region'),
            'bucket' => Config::get('imgfoo.settings.aws_bucket'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'visibility' => 'public',
        ];
        Config::set('filesystems.disks.s3', $s3);
    }
}
