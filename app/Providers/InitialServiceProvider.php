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
                $configSettings = Config::get('imgpool.settings');
                foreach ($configSettings as $key => $value) {
                    if (isset($setting->$key)) {
                        Config::set('imgpool.settings.' . $key, $setting->$key);
                    }
                }
            }
        }

        $s3 = [
            'driver'     => 's3',
            'key'        => Config::get('imgpool.settings.aws_access_key'),
            'secret'     => Config::get('imgpool.settings.aws_secret_access_key'),
            'region'     => Config::get('imgpool.settings.aws_region'),
            'bucket'     => Config::get('imgpool.settings.aws_bucket'),
            'url'        => env('AWS_URL'),
            'endpoint'   => env('AWS_ENDPOINT'),
            'visibility' => 'public',
        ];

        $google = [
            'client_id'     => Config::get('imgpool.settings.google_client_id'),
            'client_secret' => Config::get('imgpool.settings.google_secret'),
            'redirect'      => url('/auth/google/callback')
        ];

        $facebook = [
            'client_id'     => Config::get('imgpool.settings.facebook_client_id'),
            'client_secret' => Config::get('imgpool.settings.facebook_secret'),
            'redirect'      => url('/auth/facebook/callback')
        ];


        /* Recaptcha */
        Config::set('captcha.sitekey', Config::get('imgpool.settings.recaptcha_site_key'));
        Config::set('captcha.secret', Config::get('imgpool.settings.recaptcha_secret_key'));

        /* Google API */
        Config::set('services.google', $google);

        /* Facebook API */
        Config::set('services.facebook', $facebook);

        /* AWS S3 API */
        Config::set('filesystems.disks.s3', $s3);
    }
}
