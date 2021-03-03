<?php


/* Imgfoo config file */

return [
    /* Do not change if possible */
    'local_folder'        => 'if',
    'user_avatars_folder' => 'avatars',
    'aws_folder'          => 'if',
    'accepted_mimes'      => 'jpeg,jpg,png,svg,gif',
    'upload_folder'       => 'df', // Upload Folder for website uploads (logo,favicon,avatar etc.)
    'max_avatar_size'     => '3000', // MB

    /* DO NOT EDIT */
    'anonymous_user'      => [
        'username'     => 'Anonymous',
        'avatar'       => '',
        'email'        => '',
        'status'       => true,
        'is_admin'     => false,
        'is_anonymous' => true
    ],
    /* DO NOT EDIT */


    'settings' => [
        /* Website Settings */
        'website_name'          => 'Imgfoo',
        'menu_title'            => 'About',

        /* SEO */
        'site_title'            => 'Imgfoo',
        'site_description'      => 'Imgfoo',
        'site_keywords'         => 'imgfoo,upload image',

        /* Upload Settings */
        'max_file_size'         => '5000', // 5 MB
        'one_time_uploads'      => '5', // 5 images in one post
        'uploads_storage'       => 'local', // "local","aws"

        /* Analytics */
        'google_analytics'      => '',

        /* Dropzone Settings */
        'dropzone_rule'         => 'Max 5 files in one time and JPG,PNG,GIF,SVG are accepted, 25MB limit',
        'dropzone_text'         => 'Drop files here, paste or %{browse}',
        'browse_text'           => 'browse files',

        /* AWS Settings */
        'aws_access_key'        => '',
        'aws_secret_access_key' => '',
        'aws_region'            => '',
        'aws_bucket'            => '',
        'aws_url'               => '',

        /* Login Settings */
        'google_client_id'      => '',
        'google_secret'         => '',
        'facebook_client_id'    => '',
        'facebook_secret'       => '',
        'recaptcha_site_key'    => '',
        'recaptcha_secret_key'  => '',
    ],

];
