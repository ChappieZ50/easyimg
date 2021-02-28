<?php


/* Imgfoo config file */

return [
    'local_folder'          => 'if',
    'aws_folder'            => 'if',
    'max_upload_size'       => '5000', // 5 MB
    'accepted_mimes'        => 'jpeg,jpg,png,svg,gif',

    /* DO NOT EDIT */
    'anonymous_user' => [
        'username' => 'Anonymous',
        'avatar' => '',
        'email' => '',
        'status' => true,
        'is_admin' => false,
        'is_anonymous' => true
    ]
    /* DO NOT EDIT */
];
