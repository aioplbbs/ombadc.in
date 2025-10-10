<?php

if (!function_exists('frontAsset')) {
    function frontAsset($path)
    {
        $base = env('FRONT_ASSET_URL', config('app.asset_url'));
        return rtrim($base, '/') . '/' . ltrim($path, '/');
    }
}