<?php


/* Imgfoo config file */

return [
    'local_folder'     => 'if',
    'aws_folder'       => 'if',
    'max_upload_size'  => 5000, // 5 MB
    'one_time_uploads' => 5, // 5
    'accepted_mimes'   => 'jpeg,jpg,png,svg,gif',

    /* Upload Folder for website uploads (logo,favicon,avatar etc.)*/
    'upload_folder'     => 'df',

    /* DO NOT EDIT */
    'anonymous_user'   => [
        'username'     => 'Anonymous',
        'avatar'       => '',
        'email'        => '',
        'status'       => true,
        'is_admin'     => false,
        'is_anonymous' => true
    ]
    /* DO NOT EDIT */
];
