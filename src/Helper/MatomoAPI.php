<?php

namespace Rocramer\MatomoAnalytics\Helper;

use Carbon\Carbon;

class MatomoAPI
{
    /**
     * Fetches Matomo visit summaries.
     *
     * @param $method string Matomo Analytics API method
     * @param $date int date range
     * @param string|null $segment
     *
     * @return string
     */
    public static function visitsSummary(string $method, int $date = 7, string $segment = null): array
    {
        $token_auth = config('services.matomo.token', env('MATOMO_TOKEN'));
        $page_id = config('services.matomo.page_id', env('MATOMO_PAGE_ID'));
        $url = config('services.matomo.url', env('MATOMO_URL'));

        $url .= "?module=API&method=VisitsSummary.$method";
        $url .= "&idSite=$page_id&period=day&date=last$date";
        $url .= '&format=PHP';
        $url .= "&token_auth=$token_auth";

        if (!empty($segment)) {
            $url .= "&segment=$segment";
        }

        $fetched = file_get_contents($url);
        $results = unserialize($fetched);

        return $results;
    }

    /**
     * Fetches Matomo actions.
     *
     * @param string $method
     * @param int    $range
     *
     * @return array
     */
    public static function actions(string $method, int $range): array
    {
        $token_auth = config('services.matomo.token', env('MATOMO_TOKEN'));
        $page_id = config('services.matomo.page_id', env('MATOMO_PAGE_ID'));
        $url = config('services.matomo.url', env('MATOMO_URL'));

        $till = Carbon::now()->toDateString();
        $from = Carbon::now()->subDays($range)->toDateString();

        $url .= "?module=API&method=Actions.$method";
        $url .= "&idSite=$page_id&period=range&date=$from,$till";
        $url .= '&format=PHP';
        $url .= '&filter_limit=10';
        $url .= "&token_auth=$token_auth";

        $fetched = file_get_contents($url);
        $results = unserialize($fetched);

        return $results;
    }
}
