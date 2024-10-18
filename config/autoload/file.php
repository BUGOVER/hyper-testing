<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use function Hyperf\Support\env;

return [
    'credentials' => [
        'key' => env('S3_KEY'),
        'secret' => env('S3_SECRET'),
    ],
    'region' => env('S3_REGION'),
    'version' => 'latest',
    'bucket_endpoint' => false,
    'use_path_style_endpoint' => true,
    'endpoint' => env('S3_ENDPOINT'),
    'bucket_name' => env('S3_BUCKET'),
];
