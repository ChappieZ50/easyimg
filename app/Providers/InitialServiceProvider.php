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

        $google = [
            'client_id' => Config::get('imgfoo.settings.google_client_id'),
            'client_secret' => Config::get('imgfoo.settings.google_secret'),
            'redirect' => url('/auth/google/callback')
        ];

        $facebook = [
            'client_id' => Config::get('imgfoo.settings.facebook_client_id'),
            'client_secret' => Config::get('imgfoo.settings.facebook_secret'),
            'redirect' => url('/auth/facebook/callback')
        ];

        Config::set('services.google',$google);
        Config::set('services.facebook', $facebook);
        Config::set('filesystems.disks.s3', $s3);
    }
}
