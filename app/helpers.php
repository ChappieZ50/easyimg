<?php

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

if (!function_exists('file_url')) {
    function file_url($file)
    {
        if ($file->uploaded_to === 'local') {
            $link = asset(config('imgfoo.local_folder') . '/' . $file->file_full_id);
        } elseif ($file->uploaded_to === 'aws') {
            $link = asset(config('imgfoo.aws_folder') . '/' . $file->file_full_id);
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
        return $file ? asset(config('imgfoo.user_avatars_folder') . '/' . $file) :
            ($path ? $path : asset('assets/images/avatar.png'));
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
    function upload_file($file, $uploadFolder, $delete = '')
    {
        $extension = $file->getClientOriginalExtension();
        $path = public_path($uploadFolder);
        $fileId = Str::random(12);
        $name = $fileId . '.' . $extension;
        $fileSize = $file->getSize();
        $fileOriginalId = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        if ($file->move($path, $name)) {
            if ($delete) {
                File::delete(public_path($uploadFolder . '/' . $delete));
            }
            return response()->json([
                'status'           => true,
                'extension'        => $extension,
                'name'             => $name,
                'file_id'          => $fileId,
                'file_original_id' => $fileOriginalId,
                'file_size'        => $fileSize,
                'url'              => asset($uploadFolder . '/' . $name)
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
