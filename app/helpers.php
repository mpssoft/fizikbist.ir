<?php


use App\Helpers\DeviceHelper;

if (!function_exists('is_tv')) {
    /**
     * Check if the current device is a TV
     *
     * @return bool
     */
    function is_tv(): bool
    {
        return DeviceHelper::isTV();
    }
}
