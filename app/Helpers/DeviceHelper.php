<?php


namespace App\Helpers;


class DeviceHelper
{
    /**
     * Detect if the device is a TV based on User Agent
     *
     * @return bool
     */
    public static function isTV(): bool
    {


        // Common TV user agent patterns
        $tvPatterns = [
            // Smart TVs
            '/smart[-_\s]?tv/i',
            '/android.tv/i',
            '/tizen/i',
            '/webos/i',
            '/netcast/i',
            '/opera.tv/i',
            '/philipstv/i',
            '/bravia/i',
            '/panasonic.tv/i',
            '/lg\s+tv/i',
            '/samsung\s+tv/i',
            '/sony\s+tv/i',

            // TV browsers and apps
            '/crkey/i', // Chromecast
            '/appletv/i',
            '/apple\s+tv/i',
            '/aft\w+/i', // Amazon Fire TV
            '/fire\s+tv/i',
            '/nettv/i',
            '/googletv/i',
            '/viera/i',
            '/aquos/i',
            '/roku/i',
            '/dlnadoc/i',

            // TV-specific identifiers
            '/tv.*browser/i',
            '/tv.*version/i',
            '/hbbtv/i',
        ];

        $userAgent = request()->userAgent() ?? '';

        // Check if any TV pattern matches the user agent
        foreach ($tvPatterns as $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return true;
            }
        }


        return false;
    }

    /**
     * Alternative method using only regex for simpler implementation
     *
     * @return bool
     */
    public static function isTVSimple(): bool
    {
        $userAgent = request()->userAgent() ?? '';

        $tvKeywords = [
            'smarttv', 'smart-tv', 'smart tv',
            'androidtv', 'android-tv', 'android tv',
            'tizen', 'webos', 'netcast', 'operatv',
            'crkey', 'appletv', 'firetv', 'nettv',
            'googletv', 'roku', 'hbbtv', 'philipstv',
            'bravia', 'panasonictv', 'lgtv', 'samsungtv',
            'sonytv', 'viera', 'aquos'
        ];

        $userAgentLower = strtolower($userAgent);

        foreach ($tvKeywords as $keyword) {
            if (strpos($userAgentLower, $keyword) !== false) {
                return true;
            }
        }

        return false;
    }
}
