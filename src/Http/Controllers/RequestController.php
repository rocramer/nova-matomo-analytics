<?php

namespace Rocramer\MatomoAnalytics\Http\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Rocramer\MatomoAnalytics\Helper\MatomoAPI;

class RequestController extends Controller
{
    public function getPageUrls(int $range)
    {
        $result = Cache::remember('matomo_page_urls_'.$range, config('services.matomo.caching', 5), function () use ($range) {
            return MatomoAPI::actions('getPageUrls', $range);
        });

        return $result;
    }

    public function getEntryPages(int $range)
    {
        $result = Cache::remember('matomo_entry_pages_'.$range, config('services.matomo.caching', 5), function () use ($range) {
            return MatomoAPI::actions('getEntryPageUrls', $range);
        });

        return $result;
    }

    public function getExitPages(int $range)
    {
        $result = Cache::remember('matomo_exit_pages_'.$range, config('services.matomo.caching', 5), function () use ($range) {
            return MatomoAPI::actions('getExitPageUrls', $range);
        });

        return $result;
    }
}
