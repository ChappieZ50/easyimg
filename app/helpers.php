<?php

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
    function upload_file($file, $uploadFolder)
    {
        $extension = $file->getClientOriginalExtension();
        $path = public_path($uploadFolder);
        $fileId = Str::random(12);
        $name = $fileId . '.' . $extension;
        $fileSize = $file->getSize();
        $fileOriginalId = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        if ($file->move($path, $name)) {
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
