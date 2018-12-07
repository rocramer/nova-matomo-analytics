<?php

namespace Rocramer\MatomoAnalytics\Cards;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\TrendResult;
use Rocramer\MatomoAnalytics\CustomizedTrend;
use Rocramer\MatomoAnalytics\Helper\MatomoAPI;

class Downloads extends CustomizedTrend
{
    /**
     * Calculate the value of the metric.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $url = MatomoAPI::url('VisitsSummary.getActions', $request->range, 'actionType==downloads');

        $fetched = file_get_contents($url);

        $results = unserialize($fetched);

        return (new TrendResult())
            ->trend($results)
            ->showLatestValue();
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'downloads';
    }
}
