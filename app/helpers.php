<?php

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('download_file')) {
    function download_file($file)
    {
        $name = $file->file_full_id;

        if ($file->uploaded_to === 'aws') {
            return Storage::disk('s3')->download(config('imgfoo.aws_folder') . '/' . $name);
        } else {
            return response()->download(config('imgfoo.local_folder') . '/' . $name);
        }
    }
}

if (!function_exists('file_url')) {
    function file_url($file)
    {
        if ($file->uploaded_to === 'local') {
            $link = asset(config('imgfoo.local_folder') . '/' . $file->file_full_id);
        } elseif ($file->uploaded_to === 'aws') {
            $link = Storage::disk('s3')->url(config('imgfoo.aws_folder') . '/' . $file->file_full_id);
        } else {
            $link = asset($file->file_full_id);
        }
        return $link;
    }
}

if (!function_exists('website_file_url')) {
    function website_file_url($file, $path = '')
    {
        return !$path ? asset(config('imgfoo.upload_folder') . '/' . $file) : asset($path . $file);
    }
}

if (!function_exists('avatar_url')) {
    function avatar_url($file, $path = '')
    {
        return $file ? asset(config('imgfoo.user_avatars_folder') . '/' . $file) : ($path ? $path : asset('assets/images/avatar.png'));
    }
}

if (!function_exists('get_analytics_script')) {
    function get_analytics_script()
    {
        $setting = Setting::first();

        if ($setting && $setting->google_analytics) {
            return "<!-- Global site tag (gtag.js) - Google Analytics -->
                    <script async src='https://www.googletagmanager.com/gtag/js?id=$setting->google_analytics'></script>
                    <script>
                        window.dataLayer = window.dataLayer || [];

                        function gtag() {
                            dataLayer.push(arguments);
                        }
                        gtag('js', new Date());

                        gtag('config', '$setting->google_analytics');

                    </script>";
        }

        return '';
    }
}

if (!function_exists('readable_size')) {
    function readable_size($size, $unit = "")
    {
        if ((!$unit && $size >= 1 << 30) || $unit == " GB")
            return number_format($size / (1 << 30), 2) . " GB";
        if ((!$unit && $size >= 1 << 20) || $unit == " MB")
            return number_format($size / (1 << 20), 2) . " MB";
        if ((!$unit && $size >= 1 << 10) || $unit == " KB")
            return number_format($size / (1 << 10), 2) . " KB";
        return number_format($size) . " bytes";
    }
}

if (!function_exists('upload_file')) {
    function upload_file($file, $uploadFolder, $delete = '', $disk = '')
    {
        $extension = $file->getClientOriginalExtension();
        $fileId = Str::random(12);
        $name = $fileId . '.' . $extension;
        $fileSize = $file->getSize();
        $fileOriginalId = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        if ($disk) {
            $put =  Storage::disk($disk)->put($uploadFolder . '/' . $name, file_get_contents($file), 'public');
        } else {
            $put = $file->move(public_path($uploadFolder), $name);
        }

        if ($put) {
            if ($delete) {
                if ($disk) {
                    Storage::disk($disk)->delete($uploadFolder . '/' . $delete);
                } else {
                    File::delete(public_path($uploadFolder . '/' . $delete));
                }
            }
            return response()->json([
                'status'           => true,
                'extension'        => $extension,
                'name'             => $name,
                'file_id'          => $fileId,
                'file_original_id' => $fileOriginalId,
                'file_size'        => $fileSize,
                'url'              => !$disk ? asset($uploadFolder . '/' . $name) : Storage::disk($disk)->url($uploadFolder . '/' . $name)
            ]);
        }

        return response()->json(['status' => false]);
    }
}

if (!function_exists('get_setting')) {
    function get_setting($name, $value = '')
    {
        if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            if ($setting && $setting->$name) {
                return $setting->$name;
            }
            return !$value ? config('imgfoo.settings.' . $name) : $value;
        }
    }
}

if (!function_exists('get_pages')) {
    function get_pages()
    {
        return Page::get();
    }
}

if (!function_exists('get_terms_page')) {
    function get_terms_page()
    {
        return Page::where('type', 'terms')->first();
    }
}

if (!function_exists('get_privacy_page')) {
    function get_privacy_page()
    {
        return Page::where('type', 'privacy')->first();
    }
}
