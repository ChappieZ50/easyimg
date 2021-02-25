<?php

if(!function_exists('file_url')){
    function file_url($file){
        if ($file->uploaded_to === 'local') {
            $link = asset(config('imgfoo.local_folder') . '/' . $file->file_full_id);
        } elseif ($file->uploaded_to === 'aws') {
            $link = asset(config('imgfoo.aws_folder').'/'. $file->file_full_id);
        } else {
            $link = asset($file->file_full_id);
        }
        return $link;
    }
}

if(!function_exists('readable_size')){
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