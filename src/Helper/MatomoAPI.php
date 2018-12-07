<?php

namespace Rocramer\MatomoAnalytics\Helper;

class MatomoAPI
{
    /**
     * Creates a Matomo API URL.
     *
     * @param $method string Matomo Analytics API method
     * @param $date int date range
     * @param string|null $segment
     *
     * @return string
     */
    public static function url(string $method, int $date = 7, string $segment = null): string
    {
        $token_auth = config('services.matomo.token', env('MATOMO_TOKEN'));
        $page_id = config('services.matomo.page_id', env('MATOMO_PAGE_ID'));
        $url = config('services.matomo.url', env('MATOMO_URL'));

        $url .= "?module=API&method=$method";
        $url .= "&idSite=$page_id&period=day&date=last$date";
        $url .= '&format=PHP';
        $url .= "&token_auth=$token_auth";

        if (!empty($segment)) {
            $url .= "&segment=$segment";
        }

        return $url;
    }
}
